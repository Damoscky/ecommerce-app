<?php

namespace App\Http\Controllers\v1\Admin;


use App\Models\Order;
use App\Models\Product;
use Validator;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Responser\JsonResponser;

class OrderController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = OrderDetails::orderBy('created_at', 'DESC')->with('order', 'billingdetails','shippingaddress','user')->paginate(12);

        return JsonResponser::send(false, '', $orders);
    }

    public function show($id)
    {
        $order = OrderDetails::with('order', 'billingdetails','shippingaddress','user')->where('id', $id)->first();

        if(!$order){
            return JsonResponser::send(true, 'Record not found', []);
        }

        return JsonResponser::send(false, 'Record found successfully', $order);
    }

    /**
     * User Orders
     */
    public function userorder(Request $request)
    {
        $orders = Order::where('email', $request->email)->orderBy('created_at', 'DESC')->with('orderdetails')->with('billingdetails')->with('shippingaddress')->paginate(10);

        return JsonResponser::send(false, '', $orders);
    }

    public function searchOrder(Request $request)
    {
        try {
            $product = Product::Where('product_name', 'LIKE', "%{$request->search}%")
                ->orWhere('product_description', 'LIKE', "%{$request->search}%")->paginate(12);

            return JsonResponser::send(false, '', $product);
        } catch (\Throwable $th) {
            logger($th);

            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }

    /**
     * Received Order
     */
    public function receivedorder()
    {
        $orders = OrderDetails::where('status', 'Received')->orderBy('created_at', 'DESC')->with('order')->with('billingdetails')->with('shippingaddress')->with('user')->paginate(12);

        return JsonResponser::send(false, $orders->count() . ' Received Orders', $orders);
    }

    public function orderStats()
    {
        $cancelledOrders = OrderDetails::where('status', 'cancelled')->count();
        $pendingOrders = OrderDetails::where('status', 'pending')->count();
        $totalOrders = OrderDetails::count();
        $orderCompleted = OrderDetails::where('status', 'completed')->count();
        $processingorders = OrderDetails::where("status", "processing")->count();
        $shippedorders = OrderDetails::where("status", "shipped")->count();

        $data = [
            'cancelledOrders' => $cancelledOrders,
            'pendingOrders' => $pendingOrders,
            'totalOrders' => $totalOrders,
            'orderCompleted' => $orderCompleted,
            "processingorders" => $processingorders,
            "shippedorders" => $shippedorders
        ];

        return JsonResponser::send(false, '', $data);
    }

    /**
     * Cancelled Order
     */
    public function cancelledorder()
    {
        $orders = OrderDetails::where('status', 'Cancelled')->orderBy('created_at', 'DESC')->with('order')->with('billingdetails')->with('shippingaddress')->with('user')->paginate(12);

        return JsonResponser::send(false, '', $orders);
    }

    /**
     * Pending Order
     */
    public function pendingorder()
    {
        $orders = OrderDetails::where('status', 'Pending')->orderBy('created_at', 'DESC')->with('order')->with('billingdetails')->with('shippingaddress')->with('user')->paginate(12);

        return JsonResponser::send(false, '', $orders);
    }

    /**
     * Shipped Order
     */
    public function shippedorder()
    {
        $orders = OrderDetails::where('status', 'Shipped')->orderBy('id', 'DESC')->with('order')->with('product')->with('user')->paginate(12);

        return JsonResponser::send(false, $orders->count() . ' Shipped Orders', $orders);
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
        $order = OrderDetails::find($id);

        if (!$order) {
            return JsonResponser::send(true, 'Order Not Found', null);
        }

        /**
         * Validate Request
         */
        $validate = $this->validateOrder($request);
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            return JsonResponser::send(true, 'Validation failed', $validate->errors()->all());
        }

        try {

            $order->update([
                'status' => $request->status,
            ]);

            return JsonResponser::send(false, 'Order Status Updated!', $order);
        } catch (\Throwable $error) {
            logger($error);

            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Order::where('id', $id)->with('orderdetails')->first();

        if (!$orders) {
            return JsonResponser::send(true, 'Order Not Found', null);
        }
        $order->delete();

        return JsonResponser::send(true, 'Order deleted successfully', null);
    }



    public function validateOrder(Request $request)
    {
        $rules = [
            "status" => "in:received|cancelled|shipped"
        ];
        $validateOrder = Validator::make($request->all(), $rules);
        return $validateOrder;
    }
}
