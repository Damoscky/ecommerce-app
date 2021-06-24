<?php

namespace App\Http\Controllers\v1\Customer;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Validator, DB, Mail;
use App\Models\OrderDetails;
use App\Models\BillingDetails;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use App\Mail\OrderEmail;
use App\Mail\VendorOrderEmail;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Services\Paystack;
use Illuminate\Support\Facades\Log;

// use Paystack;

class OrderController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$orders = OrderDetails::latest()->where('user_id', auth()->user()->id)->with('order.shippingaddress')->with('product')->with("histories")->with("user")->paginate(15);
		if ($orders->count() < 1) {
			return response()->json([
				'error' => false,
				'message' => 'You have not made any Order!',
				'data' => $orders
			]);
		}
		return response()->json([
			'error' => false,
			'message' => null,
			'data' => $orders
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		/**
		 * Validate Data
		 */
		$validate = $this->validateOrder($request);
		/**
		 * if validation fails
		 */
		if ($validate->fails()) {
			return response()->json([
				'error' => true,
				'message' => $validate->errors()->all(),
				'data' => null
			]);
		}

		// Check items condition when there are less items available to purchase
		if ($this->productsAreNoLongerAvailable()) {
			return response()->json([
				'error' => true,
				'message' => "One of the items in your cart is no longer available.",
				'data' => null
			]);
		}
		$user = auth()->user();

		$orderID = $this->generateUniqueId();

		try {
			// no time :(
			// $cartTotal = $this->calculateCartWorth();
			$order = Order::create([
				'fullname' => $user->firstname . ' ' . $user->lastname,
				'user_id' => $user->id,
				'email' => $user->email,
				'shipping_fee' => $request->total_shipping_fee,
				// 'shipping_method' => $request->shipping_method,
				'payment_method' => $request->payment_method,
				'total_price' => $request->total_price,
				'orderID' => $orderID,
			]);

			// add billing address
			BillingDetails::create([
				'fullname' => $request->bfullname,
				'email' => $user->email,
				'order_id' => $order->id,
				'phoneno' => $request->bphoneno,
				'address' => $request->baddress,
				'country' => $request->bcountry,
				'state' => $request->bstate,
				'city' => $request->bcity,
				'postal_code' => $request->bpostal_code,
			]);
			// add shipping
			if ($request->diffrent_address == 1) {
				$shippingaddress = ShippingAddress::create([
					'fullname' => $request->sfullname,
					'phoneno' => $request->sphoneno,
					'order_id' => $order->id,
					'address' => $request->saddress,
					'email' => $user->email,
					'country' => $request->scountry,
					'state' => $request->sstate,
					'city' => $request->scity,
					'postal_code' => $request->spostal_code,
				]);
			} else {
				$shippingaddress = ShippingAddress::create([
					'fullname' => $user->firstname . ' ' . $user->lastname,
					'phoneno' => $user->phoneno,
					'order_id' => $order->id,
					'email' => $user->email,
					'address' => $user->usershipping->address1,
					'country' => $user->usershipping->country1,
					'state' => $user->usershipping->state1,
					'city' => $user->usershipping->city1,
					'postal_code' => $user->usershipping->postal_code1,
				]);
			}

			$userCarts = Cart::where("user_id", $user->id)->with("product.user")->get();
			foreach ($userCarts as $cart) {
				$product = $cart->product;

				// add items order
				$orderdetails = OrderDetails::firstOrCreate([
					'order_id' => $order->id,
					'user_id' => $user->id,
					'orderNO' => $orderID,
					'product_id' => $product->id,
					'product_name' => $product->product_name,
					'merchant_id' => $product->user_id,
					'status' => "pending",
					'color' => $cart->color,
					'shipping_fee' => $product->shipping_fee,
					'quantity_ordered' => $cart->quantity,
					'unit_price' => $product->new_price,
					'sku' => $product->sku,
					// 'size' => $cart->size,
				]);
				$orderdetails->histories()->create([
					"status" => "ORDER PLACED"
				]);
				// update product
				$product->update([
					'in_stock' => $product->available_quantity > $cart->quantity,
					'quantity_purchased' => intval($product->quantity_purchased + $cart->quantity),
					"available_quantity" => $product->available_quantity - $cart->quantity
				]);

				/*** CLEAR CART ***/
				$cart->delete();
				if ($request->payment_method === "cash_on_delivery") {

					$getVendor = $product->user;
					$vendordata = [
						'email' => $getVendor->email,
						'name' => $getVendor->company_name,
						'phoneno' => $request->sphoneno ?? $user->phoneno,
						'useremail' => $user->email,
						'address' => $request->saddress ?? $user->usershipping->address1,
						'orderID' => $orderID,
						'subject' => "New Order!",
						'orderdetails' => $orderdetails,
					];

					Mail::to($getVendor->email)->send(new VendorOrderEmail($vendordata));
				}
			}


			// card
			if ($request->payment_method === "card" || $request->payment_method === "mobile_money") {
				// validate reference number
				$paystack = new Paystack();
				$result = $paystack->getPaymentData();

				if ($result["data"]["status"] !== "success") {
					// reverse the product and set order has cancelled
					$this->handleFailedTransactions($order->id, $result["data"]);

					return response()->json([
						'error' => true,
						'message' => 'Transaction not successful',
						'data' => $order
					]);
				}

				$this->paymentProcessing($order->id, $result["data"]["channel"]);


				return response()->json([
					'error' => false,
					'message' => 'Request Ordered Successfully! Kindly check your email for details.',
					'data' => $order
				]);
			}

			// on delivery payment
			if ($request->payment_method === "cash_on_delivery") {
				$address = $request->saddress ?? $user->usershipping->address1;
				$orderemail = [
					'email' => $user->email,
					'name' => $shippingaddress->fullname,
					'phoneno' => $request->sphoneno ?? $user->phoneno,
					'address' => $address,
					'orderID' => $orderID,
					'subject' => "Your Order was Successful!",
					'orders' => $order,
					'orderdetails' => $order->orderdetails,
				];

				Mail::to($user->email)->send(new OrderEmail($orderemail));
			}

			return response()->json([
				'error' => false,
				'message' => 'Request Ordered Successfully! Kindly check your email for details.',
				'data' => $order
			]);
		} catch (\Throwable $error) {
			Log::error($error);
			return response()->json([
				'error' => true,
				'message' => $error->getMessage(),
				'data' => null
			], 500);
		}
	}

	/**
	 * Cancel Order for failed transaction
	 */
	protected function handleFailedTransactions($orderId, $data)
	{
		$order = Order::where("id", $orderId)->with("orderdetails")->first();

		// update order status
		$order->update([
			"status" => "cancelled",
			"payment_status" => $data["status"],
			"payment_method" => $data["channel"],
		]);

		// update single order
		foreach ($order->orderdetails as $orderdetails) {
			$orderdetails->update([
				"payment_status" => $data["status"],
				"status" => "cancelled"
			]);
			$orderdetails->histories()->create([
				"status" => "CANCELLED"
			]);

			// update product with 
			$product = $orderdetails->product;

			$product->update([
				'in_stock' => true,
				'quantity_purchased' => intval($product->quantity_purchased - $orderdetails->quantity_ordered),
				"available_quantity" => $product->available_quantity + $orderdetails->quantity_ordered
			]);
		}
	}

	/**
	 * Process Paystack Payment
	 */
	protected function paymentProcessing($orderId, $channel)
	{
		// eager load all the necessary relationship
		$order = Order::where("id", $orderId)
			->with("orderdetails.merchant")
			->with("user")
			->with("shippingaddress")
			->first();

		if ($order->payment_status !== "paid") {

			$order->update([
				"status" => "processing",
				"payment_status" => "paid",
				"payment_method" => $channel
			]);
			// $shippingaddress = ShippingAddress::where("order_id", $order->id)->first();
			$address = $order->shippingaddress->address;
			$user = $order->user;
			$phoneno = $order->shippingaddress->phoneno;
			// update all order items an order histories
			foreach ($order->orderdetails as $orderdetails) {

				$orderdetails->update([
					"payment_status" => "paid",
					"status" => "processing"
				]);
				$orderdetails->histories()->create([
					"status" => "PENDING CONFIRMATION"
				]);
				// send mail to merchant
				$getVendor = $orderdetails->merchant;
				$vendordata = [
					'email' => $getVendor->email,
					'name' => $getVendor->store_name,
					'phoneno' => $phoneno,
					'useremail' => $user->email,
					'address' => $address,
					'orderID' => $order->orderID,
					'subject' => "New Order!",
					'orderdetails' => $orderdetails,
				];

				Mail::to($getVendor->email)->send(new VendorOrderEmail($vendordata));
			}
			// send email to customer
			$orderemail = [
				'email' => $user->email,
				'name' => $order->shippingaddress->fullname,
				'phoneno' => $phoneno,
				'address' => $address,
				'orderID' => $order->orderID,
				'subject' => "Your Order was Successful!",
				'orders' => $order,
				'orderdetails' => $order->orderdetails,
			];
			Mail::to($user->email)->send(new OrderEmail($orderemail));
		}
	}

	/**
	 * Paystack webhook
	 */
	public function webhooks(Request $request)
	{
		// Retrieve the request's body
		$paystackData = $request->getContent();

		$secretKey = env("PAYSTACK_SECRET_KEY");

		// validate event do all at once to avoid timing attack
		if ($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $paystackData, $secretKey))
			exit();
		$paymentData = json_decode($paystackData, true);

		if ($paymentData["event"] === "charge.success") {
			if ($paymentData["data"]["metadata"]["orderId"] && $paymentData["data"]["metadata"]["user_id"]) {
				// store card details for recuring payment
				$this->card($paymentData);
				// process payment
				$this->paymentProcessing($paymentData["data"]["metadata"]["orderId"], $paymentData["data"]["channel"]);
			}
		}

		return response()->json([], 200);
	}

	/**
	 * Store users card
	 */
	protected function card($data)
	{
		$cardData = [
			"email" =>  $data["data"]["customer"]["email"],
			"user_id" => $data["data"]["metadata"]["user_id"]
		];
		$cardData = array_merge($cardData, $data["data"]["authorization"]);

		return Card::firstOrCreate(
			[
				"email" => $cardData["email"],
				"signature" => $cardData["signature"]
			],
			[
				"user_id" => $cardData["user_id"],
				"authorization_code" => $cardData["authorization_code"],
				"bin" => $cardData["bin"],
				"last4" => $cardData["last4"],
				"exp_month" => $cardData["exp_month"],
				"exp_year" => $cardData["exp_year"],
				"channel" => $cardData["channel"],
				"card_type" => $cardData["card_type"],
				"bank" => $cardData["bank"],
				"country_code" => $cardData["country_code"],
				"brand" => $cardData["brand"],
				"reusable" => $cardData["reusable"],
			]
		);
	}

	/**
	 * calculate cart worth
	 * WIP
	 */
	protected function calculateCartWorth()
	{
		$userCarts = Cart::where("user_id", auth()->user()->id)->with("product")->get();
		$total_shipping_fee = 0;
		$total_price = 0;
		foreach ($userCarts as $cart) {
			$product = $cart->product;
			$total_price += floatval($product->new_price * $cart->quantity);
			$total_shipping_fee += floatval($product->shipping_fee1 * $cart->quantity);
		}
		return [
			"total_shipping_fee" => $total_shipping_fee,
			"total_price" => $total_price
		];
	}

	/**
	 * Generate unique order id
	 */
	protected function generateUniqueId()
	{
		// generate unique numbers for order id
		$orderID = hexdec(bin2hex(openssl_random_pseudo_bytes(5)));
		$orderIdExist = Order::find($orderID);
		// if exist append the id of d existed copy to new one to make it unique
		if ($orderIdExist) {
			$orderID = $orderID . '' . $orderIdExist->id;
		}
		return $orderID;
	}

	/**
	 * Product validation
	 */
	protected function productsAreNoLongerAvailable()
	{
		// eager load user carts with products for performance sake
		$userCarts = Cart::where("user_id", auth()->user()->id)->with("product")->get();
		// validate empty user cart
		if ($userCarts->isEmpty()) {
			return true;
		}
		// validate product quantity against order quantity
		foreach ($userCarts as $cart) {
			$product = $cart->product;
			if ($product->available_quantity < $cart->quantity) {
				return true;
			}
		}

		return false;
	}
	/**
	 * Order Details
	 */
	public function orderdetails($id)
	{
		$orders = OrderDetails::where('id', $id)->where("user_id", auth()->user()->id)->with('order.shippingaddress')->with("histories")->with(['product' => function ($query) {
			$query->select("id", "cat_id", "sub_cat_id", "product_name", "product_description", "product_image", "in_stock", "old_price", "new_price");
		}])->with(['user' => function ($query) {
			$query->select("id", "firstname", "lastname", "image");
		}])->first();
		if (!$orders) {
			return response()->json([
				'error' => true,
				'message' => 'Order! not found',
				'data' => null
			], 404);
		}
		return response()->json([
			'error' => false,
			'message' => null,
			'data' => $orders
		]);
	}



	public function validateOrder(Request $request)
	{
		$rules = [
			"total_shipping_fee" => "required|integer",
			"total_price" => "required",
			"payment_method" => "required|string|in:card,cash_on_delivery,mobile_money",
			// "shipping_method" => "required|string|in:door_delivery,pick_up",
			"bphoneno" => "required|min:10|max:12",
			"baddress" => "required|string|max:255",
			"bcountry" => "string|max:150",
			"bstate" => "required|string|max:150",
			"bcity" => "required|string|max:150",
			"diffrent_address" => "boolean",
		];

		if ($request->payment_method == "card" || $request->payment_method == "mobile_money") {
			$rules["trxref"] = "required|max:250";
		}

		// if ($request->payment_method == "mobile_money") {
		// 	$rules["phone"] = "required|min:10|max:12";
		// 	$rules["provider"] = "required|string|max:5|in:mtn,vod,tgo";
		// }

		if ($request->different_address == 1) {
			$rules["sfullname"] = "required|string|max:255";
			$rules["sphoneno"] = "required|string|min:10|max:12";
			$rules["saddress"] = "required|string|max:255";
			$rules["scountry"] = "string|max:150";
			$rules["sstate"] = "required|string|max:150";
			$rules["scity"] = "required|string|max:150";
		}
		$validateOrder = Validator::make($request->all(), $rules);
		return $validateOrder;
	}

	/**
	 *Check Stock
	 */
	public function checkStock(Request $request)
	{
		$userCarts = Cart::where("user_id", auth()->user()->id)->with("product")->get();
		// validate empty user cart
		if ($userCarts->isEmpty()) {
			return response()->json([
				'error' => true,
				'message' => 'Can not checkout an empty cart',
				'data' => null
			]);;
		}

		foreach ($userCarts as $cart) {

			/*** Confirm Instock  ***/
			if (!$cart->product->in_stock || $cart->product->available_quantity < 1) {
				return response()->json([
					'error' => true,
					'message' => $cart->product->product_name . ' is Out of Stock!',
					'data' => null
				]);
			}

			// validate product quantity against order quantity
			if ($cart->product->available_quantity < $cart->quantity) {
				return response()->json([
					'error' => true,
					'message' => $cart->product->product_name . ' only have ' . $cart->product->available_quantity . ' quantity left',
					'data' => null
				]);
			}
		}
		return response()->json([
			'error' => false,
			'message' => 'Product Available',
			'data' => null
		]);
	}
}
