<?php

namespace App\Http\Controllers\v1\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Validator;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->where('status', 1)->with('product')->get();
        if (count($carts) < 1) {
            return response()->json([
                'error' => false,
                'message' => 'Cart is Empty',
                'data' => null,
            ], 200);
        }
        return response()->json([
            'error' => false,
            'message' => $carts->count() . ' Item(s) Found',
            'data' => $carts
        ], 200);
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
        $validate = $this->validateCart($request);
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validate->errors()->all(),
                'data' => null
            ], 400);
        }
        $userId = auth()->user()->id;
        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json([
                'error' => true,
                'message' => "Invalid product",
                'data' => null
            ], 404);
        }
        if (!$product->in_stock || $product->available_quantity < 1) {
            return response()->json([
                'error' => true,
                'message' => "Product is Out of Stock!",
                'data' => null
            ], 200);
        }
        $cartexist = Cart::where('product_id', $request->product_id)->where('user_id', $userId)->first();
        if ($cartexist) {
            $totalquantity = $cartexist->quantity + $request->quantity;
            $totalprice = $totalquantity * $request->price;
            if ($totalquantity > $product->available_quantity) {
                return response()->json([
                    'error' => true,
                    'message' => "Can not add more than the available quantity",
                    'data' => null
                ], 200);
            }

            $cart = $cartexist->update([
                'quantity' => $totalquantity,
                'price' => $request->price,
                'total_price' => $totalprice,
            ]);
        } else {
            $totalprice = $request->quantity * $request->price;
            $cart = Cart::create([
                'user_id' => $userId,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'total_price' => $totalprice,
            ]);
        }

        return response()->json([
            'error' => false,
            'message' => 'Item added to Cart!',
            'data' => $cart,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::where('id', $id)->where('user_id', auth()->user()->id)->with("product")->first();
        if (!$cart) {
            return response()->json([
                'error' => true,
                'message' => 'Cart not Found',
                'data' => null,
            ], 404);
        }
        if (!$cart->product->in_stock || $cart->product->available_quantity < 1) {
            return response()->json([
                'error' => true,
                'message' => 'Product Out of stock!',
                'data' => null,
            ], 200);
        }
        if ($cart->product->available_quantity < $request->quantity) {
            $cart->update([
                'quantity' => $cart->product->available_quantity,
                'total_price' => $cart->product->available_quantity * $cart->price,
            ]);
            return response()->json([
                'error' => true,
                'message' => 'Can not add more than the available quantiy',
                'data' => null
            ], 200);
        }

        $totalprice = $request->quantity * $cart->price;

        $cart->update([
            'quantity' => $request->quantity,
            'total_price' => $totalprice,
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Cart Updated!',
            'data' => $cart
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if (!$cart) {
            return response()->json([
                'error' => true,
                'message' => "Cart not found",
                'data' => null
            ], 404);
        }
        $cart->delete();
        return response()->json([
            'error' => false,
            'message' => 'Item has been removed from cart',
            'data' => null
        ]);
    }

    /**
     * Login and transfer item to cart
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function transferCart(Request $request)
    {
        $userId = auth()->user()->id;

        if (is_array($request->carts)) {
            foreach ($request->carts as $key => $values) {
                $cartexist = Cart::where('product_id', $values["product_id"])->where('user_id', $userId)->where('status', 1)->first();
                if ($cartexist) {
                    $totalquantity = $cartexist->quantity + $values["quantity"];
                    $totalprice = $totalquantity * $values["price"];
                    $cart = $cartexist->update([
                        'quantity' => $totalquantity,
                        'price' => $values["price"],
                        'total_price' => $totalprice,
                    ]);
                } else {
                    $totalprice = $values["quantity"] * $values["price"];
                    $carts[] = Cart::firstOrCreate([
                        'user_id' => $userId,
                        'product_id' => $values["product_id"],
                        'quantity' => $values["quantity"],
                        'price' => $values["price"],
                        'total_price' => $totalprice,
                    ]);
                }
            }
            return response()->json([
                'error' => false,
                'message' => "Items Moved to Cart successfully!",
                'data' => $carts,
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => "Invalid carts format",
            'data' => null,
        ]);
    }

    /**
     * Validate Cart Request
     */
    public function validateCart(Request $request)
    {
        $rules = [
            'product_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ];
        $validateCart = Validator::make($request->all(), $rules);
        return $validateCart;
    }
}
