<?php

namespace App\Http\Controllers\v1\Vendor;


use Validator;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Responser\JsonResponser;

class OrderController extends Controller
{
    /**
     * Merchant Order
     */
    public function merchantOrders()
    {
        $orders = OrderDetails::where('merchant_id', auth()->user()->id)->orderBy('created_at', 'DESC')->with('order')->paginate(12);

        return JsonResponser::send(false, $orders->count() . ' Orders', $orders);
    }

    /**
     * Merchant Received Order
     */
    public function merchantReceivedOrder()
    {
        $orders = OrderDetails::where('merchant_id', auth()->user()->id)->where('status', 'Received')->orderBy('id', 'DESC')->with('order')->with('user')->paginate(12);

        return JsonResponser::send(false, $orders->count() . ' Received Orders', $orders);
    }

    /**
     * Merchant Cancelled Order
     */
    public function merchantCancelledOrder()
    {
        $orders = OrderDetails::where('merchant_id', auth()->user()->id)->where('status', 'Cancelled')->orderBy('id', 'DESC')->with('order')->paginate(12);

        return JsonResponser::send(false, $orders->count() . ' Cancelled Orders', $orders);
    }

    /**
     * Merchant Pending Order
     */
    public function merchantPendingOrder()
    {
        $orders = OrderDetails::where('merchant_id', auth()->user()->id)->where('status', 'Pending')->orderBy('id', 'DESC')->with('order')->with('user')->paginate(12);

        return JsonResponser::send(false, $orders->count() . ' Pending Orders', $orders);
    }

    /**
     * Merchant Pending Order
     */
    public function merchantShippedOrder()
    {
        $orders = OrderDetails::where('merchant_id', auth()->user()->id)->where('status', 'Shipped')->orderBy('id', 'DESC')->with('order')->paginate(12);

        return JsonResponser::send(false, $orders->count() . ' Shipped Orders', $orders);
    }

    public function validateOrder(Request $request)
    {
        $rules = [
            "status" => "in:received|cancelled|shipped"
        ];
        $validateOrder = Validator::make($request->all(), $rules);
        return $validateOrder;
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

        if ($order->merchant_id != auth()->user()->id) {
            return JsonResponser::send(true, 'Access Denied', null, 403);
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
}
