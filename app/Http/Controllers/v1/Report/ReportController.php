<?php

namespace App\Http\Controllers\v1\Report;


use App\Models\User;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\BillingDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{

    public function orderReportExport(Request $request)
    {
        try {
            $from = $request->start_date;
            $to = $request->end_date;
            if($request->status == 'All'){
                $orders = OrderDetails::WhereBetween('created_at', [$from, $to])->orderBy('created_at', 'DESC')->with('order')->with('billingdetails')->with('shippingaddress')->with('product')->with('user')->get();
            }else{
                $orders = OrderDetails::Where('status', $request->status)->whereBetween('created_at', [$from, $to])->orderBy('created_at', 'DESC')->with('order')->with('billingdetails')->with('shippingaddress')->with('product')->with('user')->get();
            }
            if (!$orders) {
                return response()->json([
                    'error' => true,
                    'message' => 'Data not found',
                    'data' => null
                ]);
            }
            return response()->json([
                'error' => false,
                'message' => 'Report on orders',
                'data' => $orders
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage(),
                'data' => null
            ]);
        }
    }
    
    
    
    /**
     * Orders Report
     */
    public function orderReport(Request $request)
    {
        try {
            $from = $request->start_date;
            $to = $request->end_date;
            if($request->status == 'All'){
                $orders = OrderDetails::WhereBetween('created_at', [$from, $to])->orderBy('created_at', 'DESC')->with('order')->with('billingdetails')->with('shippingaddress')->with('product')->with('user')->get();
            }else{
                $orders = OrderDetails::Where('status', $request->status)->whereBetween('created_at', [$from, $to])->orderBy('created_at', 'DESC')->with('order')->with('billingdetails')->with('shippingaddress')->with('product')->with('user')->get();
            }
            if (!$orders) {
                return response()->json([
                    'error' => true,
                    'message' => 'Data not found',
                    'data' => null
                ]);
            }
            return response()->json([
                'error' => false,
                'message' => 'Report on orders',
                'data' => $orders
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage(),
                'data' => null
            ]);
        }
    }

    // public function orderReportExport(Request $request)
    // {
    //     try {
    //         $from = $request->start_date;
    //         $enddate = $request->end_date;
    //         $status = $request->status;
    //         $orderdetails = DB::select("SELECT * FROM order_details
    //         where order_details.status = '$status' AND order_details.created_at >= '$from' AND order_details.created_at <= '$enddate' ");
    //         $user_record[] = array('Customer Name', 'Vendor', 'Product Name', 'Unit Price', 'Quantity Ordered', 'Total Price', 'Date/Time');
    //         foreach($orderdetails as $order)
    //         {
    //             // $product = Product::find($order->product_id);
    //             $vendor = User::find($order->merchant_id);
    //             $billingdetails = BillingDetails::find($order->order_id);
    //             $total = $order->unit_price * $order->quantity_ordered;
    //             // if($total == null){
    //             //     $amount = '0.00';
    //             // }else{
    //             //     $amount = $user->amount;
    //             // }
    //         $user_record[] = array(
    //         'Customer Name'  => $billingdetails->fullname,
    //         'Vendor'   => $vendor->company_name,
    //         'Product Name'    => $order->product_name,
    //         'Unit Price' => $order->unit_price,
    //         'Quantity Ordered'  => $order->quantity_ordered,
    //         'Total Price'   => $total,
    //         'Date/Time'   => $order->created_at,
    //         );
    //         }
    //         Excel::create('Order Report', function($excel) use ($user_record){
    //         $excel->setTitle($request->status.' Order Report');
    //         $excel->sheet($request->status.' Order Report', function($sheet) use ($user_record){
    //         $sheet->fromArray($user_record, null, 'A1', false, false);
    //         });
    //         })->download('xlsx');
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'error' => true,
    //             'message' => $th->getMessage(),
    //             'data' => null
    //         ]);
    //     }
    // }

    /**
     * Orders Report
     */
    public function customerReport(Request $request)
    {
        try {
            $from = $request->start_date;
            $to = $request->end_date;
            $userRole = 'customer';
            if($request->status == 'All'){
                $users = User::whereHas('roles', function ($roleTable) use ($userRole) {
                    $roleTable->where('name', $userRole);
                })->WhereBetween('created_at', [$from, $to])->orderBy('created_at', 'DESC')->get();

            }else{
                $users = User::whereHas('roles', function ($roleTable) use ($userRole) {
                    $roleTable->where('name', $userRole);
                })->Where('is_active', $request->status)->WhereBetween('created_at', [$from, $to])->orderBy('created_at', 'DESC')->get();
            }
            if (!$users) {
                return response()->json([
                    'error' => true,
                    'message' => 'Record not found',
                    'data' => null
                ]);
            }
            return response()->json([
                'error' => false,
                'message' => null,
                'data' => $users
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage(),
                'data' => null
            ]);
        }
    }


    /**
     * Vendor Report
     */
    public function vendorReport(Request $request)
    {
        try {
            $from = $request->start_date;
            $to = $request->end_date;
            $userRole = 'vendor';
            if($request->status == 'All'){
                $users = User::whereHas('roles', function ($roleTable) use ($userRole) {
                    $roleTable->where('name', $userRole);
                })->WhereBetween('created_at', [$from, $to])->orderBy('created_at', 'DESC')->get();

            }else{
                $users = User::whereHas('roles', function ($roleTable) use ($userRole) {
                    $roleTable->where('name', $userRole);
                })->where('is_active', $request->status)->WhereBetween('created_at', [$from, $to])->orderBy('created_at', 'DESC')->get();
            }
            if (!$users) {
                return response()->json([
                    'error' => true,
                    'message' => 'Record not found',
                    'data' => null
                ]);
            }
            return response()->json([
                'error' => false,
                'message' => null,
                'data' => $users
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage(),
                'data' => null
            ]);
        }
    }


    /**
     * Product Report
     */
    public function productReport(Request $request)
    {
        try {
            $from = $request->start_date;
            $to = $request->end_date;
            $category = $request->status;
            if($request->status === "All"){
                $products = Product::WhereBetween('created_at', [$from, $to])->orderBy('created_at', 'DESC')->get();
            }else{
                $products = Product::WhereBetween('created_at', [$from, $to])->Where('is_active', $request->status)->orderBy('created_at', 'DESC')->get();
            }
            if (!$products) {
                return response()->json([
                    'error' => true,
                    'message' => 'Record not found',
                    'data' => null
                ]);
            }
            return response()->json([
                'error' => false,
                'message' => null,
                'data' => $products
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage(),
                'data' => null
            ]);
        }
    }

    /**
     * Product Report
     */
    public function vendorproductReport(Request $request)
    {
        try {
            $from = $request->start_date;
            $to = $request->end_date;
            $category = $request->status;
            if($request->status == 'All'){
                $products = Product::WhereBetween('created_at', [$from, $to])->where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
            }else{
                $products = Product::WhereBetween('created_at', [$from, $to])->where('user_id', Auth::id())->Where('is_active', $request->status)->orderBy('created_at', 'DESC')->get();
            }
            if (!$products) {
                return response()->json([
                    'error' => true,
                    'message' => 'Record not found',
                    'data' => null
                ]);
            }
            return response()->json([
                'error' => false,
                'message' => null,
                'data' => $products
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage(),
                'data' => null
            ]);
        }
    }

     /**
     * Orders Report
     */
    public function vendororderReport(Request $request)
    {
        try {
            $from = $request->start_date;
            $to = $request->end_date;
            if($request->status == 'All'){
                $orders = OrderDetails::WhereBetween('created_at', [$from, $to])->where('merchant_id', Auth::id())->orderBy('created_at', 'DESC')->with('order')->with('billingdetails')->with('shippingaddress')->with('product')->with('user')->get();
            }else{
                $orders = OrderDetails::Where('status', $request->status)->where('merchant_id', Auth::id())->whereBetween('created_at', [$from, $to])->orderBy('created_at', 'DESC')->with('order')->with('billingdetails')->with('shippingaddress')->with('product')->with('user')->get();
            }
            if (!$orders) {
                return response()->json([
                    'error' => true,
                    'message' => 'Data not found',
                    'data' => null
                ]);
            }
            return response()->json([
                'error' => false,
                'message' => 'Report on orders',
                'data' => $orders
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage(),
                'data' => null
            ]);
        }
    }
}
