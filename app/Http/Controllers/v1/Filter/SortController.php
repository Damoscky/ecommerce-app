<?php

namespace App\Http\Controllers\v1\Filter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Message;
use App\Models\Product;
use App\Exports\ProductExportReport;
use App\Exports\CustomerExportReport;
use App\Exports\OrderExportReport;
use App\Exports\ProductReportExport;
use App\Exports\ProductReport;
use Excel;
use Auth;
class SortController extends Controller
{
    public function vendormessagesAlpha()
    {
        //Sort orders alphabetically
        $result = Message::with(['user' => function($order){
            $order->orderBy('firstname', 'ASC');
        }])->where('receiver_id', Auth::id())->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function vendormessagesDateAsc()
    {
        //Sort orders alphabetically
        $result = Message::orderBy('created_at', 'ASC')->where('receiver_id', Auth::id())->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function vendormessagesDateDesc()
    {
        //Sort orders alphabetically
        $result = Message::orderBy('created_at', 'DESC')->where('receiver_id', Auth::id())->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }
    
    
    
    public function vendorproductsAlpha()
    {
        //Sort products alphabetically
        $result = Product::where('user_id', Auth::id())->orderBy('product_name')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function vendorproductsDateAsc()
    {
        //Sort products alphabetically
        $result = Product::orderBy('created_at', 'ASC')->where('user_id', Auth::id())->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function vendorproductsDateDesc()
    {
        //Sort products alphabetically
        $result = Product::orderBy('created_at', 'DESC')->where('user_id', Auth::id())->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function vendorproductsPriceAsc()
    {
        //Sort products alphabetically
        $result = Product::orderBy('new_price', 'ASC')->where('user_id', Auth::id())->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function vendorproductsPriceDesc()
    {
        //Sort products alphabetically
        $result = Product::orderBy('new_price', 'DESC')->where('user_id', Auth::id())->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function vendorordersAlpha()
    {
        //Sort orders alphabetically
        $result = OrderDetails::orderBy('product_name')->where('merchant_id', Auth::id())->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function vendorordersDateAsc()
    {
        //Sort orders alphabetically
        $result = OrderDetails::orderBy('created_at', 'ASC')->where('merchant_id', Auth::id())->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function vendorordersDateDesc()
    {
        //Sort orders alphabetically
        $result = OrderDetails::orderBy('created_at', 'DESC')->where('merchant_id', Auth::id())->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function vendorordersPriceAsc()
    {
        //Sort orders alphabetically
        $result = OrderDetails::with(['order' => function($order){
            $order->orderBy('total_price', 'ASC');
        }])->where('merchant_id', Auth::id())->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function vendorordersPriceDesc()
    {
        //Sort orders alphabetically
        $result = OrderDetails::with(['order' => function($order){
            $order->orderBy('total_price', 'DESC');
        }])->where('merchant_id', Auth::id())->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }
    
    public function categoriesAlpha()
    {
        //Sort products alphabetically
        $result = Category::orderBy('cat_name')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function subcategoriesAlpha()
    {
        //Sort products alphabetically
        $result = SubCategory::orderBy('sub_cat_name')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }
    
    public function productsAlpha()
    {
        //Sort products alphabetically
        $result = Product::orderBy('product_name')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function subcategoriesDateAsc()
    {
        //Sort products alphabetically
        $result = SubCategory::orderBy('created_at', 'ASC')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function subcategoriesDateDesc()
    {
        //Sort products alphabetically
        $result = SubCategory::orderBy('created_at', 'DESC')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function productsDateAsc()
    {
        //Sort products alphabetically
        $result = Product::orderBy('created_at', 'ASC')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function productsDateDesc()
    {
        //Sort products alphabetically
        $result = Product::orderBy('created_at', 'DESC')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function productsPriceAsc()
    {
        //Sort products alphabetically
        $result = Product::orderBy('new_price', 'ASC')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function productsPriceDesc()
    {
        //Sort products alphabetically
        $result = Product::orderBy('new_price', 'DESC')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function messagesAlpha()
    {
        //Sort orders alphabetically
        $result = Message::with(['user' => function($order){
            $order->orderBy('firstname', 'ASC');
        }])->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function messagesDateAsc()
    {
        //Sort orders alphabetically
        $result = Message::orderBy('created_at', 'ASC')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function messagesDateDesc()
    {
        //Sort orders alphabetically
        $result = Message::orderBy('created_at', 'DESC')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function categoriesDateAsc()
    {
        //Sort orders alphabetically
        $result = Category::orderBy('created_at', 'ASC')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function categoriesDateDesc()
    {
        //Sort orders alphabetically
        $result = Category::orderBy('created_at', 'DESC')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }






    public function ordersAlpha()
    {
        //Sort orders alphabetically
        $result = OrderDetails::orderBy('product_name')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function ordersDateAsc()
    {
        //Sort orders alphabetically
        $result = OrderDetails::orderBy('created_at', 'ASC')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function ordersDateDesc()
    {
        //Sort orders alphabetically
        $result = OrderDetails::orderBy('created_at', 'DESC')->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function ordersPriceAsc()
    {
        //Sort orders alphabetically
        $result = OrderDetails::with(['order' => function($order){
            $order->orderBy('total_price', 'ASC');
        }])->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function ordersPriceDesc()
    {
        //Sort orders alphabetically
        $result = OrderDetails::with(['order' => function($order){
            $order->orderBy('total_price', 'DESC');
        }])->paginate(10);
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $result
        ]);
    }

    public function customersAlpha(){
        $role = 'customer';
        $customers = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', '=', $role);
        })->orderBy('firstname')->paginate(10);
        return response()->json([
            'error' => false,
            "message" => "All customers",
            "data" => $customers
        ]);
    }

    public function customersDateAsc()
    {
        //Sort orders alphabetically
        $role = 'customer';
        $customers = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', '=', $role);
        })->orderBy('created_at', 'ASC')->paginate(10);
        return response()->json([
            'error' => false,
            "message" => "All customers",
            "data" => $customers
        ]);
    }

    public function customersDateDesc()
    {
        //Sort orders alphabetically
        $role = 'customer';
        $customers = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', '=', $role);
        })->orderBy('created_at', 'DESC')->paginate(10);
        return response()->json([
            'error' => false,
            "message" => "All customers",
            "data" => $customers
        ]);
    }

    public function merchantsAlpha(){
        $role = 'merchant';
        $merchants = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', '=', $role);
        })->orderBy('firstname')->paginate(10);
        return response()->json([
            'error' => false,
            "message" => "All merchants",
            "data" => $merchants
        ]);
    }
    
    public function merchantsDateAsc()
    {
        //Sort orders alphabetically
        $role = 'merchant';
        $merchants = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', '=', $role);
        })->orderBy('created_at', 'ASC')->paginate(10);
        return response()->json([
            'error' => false,
            "message" => "All merchants",
            "data" => $merchants
        ]);
    }
    
    public function merchantsDateDesc()
    {
        //Sort orders alphabetically
        $role = 'merchant';
        $merchants = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', '=', $role);
        })->orderBy('created_at', 'DESC')->paginate(10);
        return response()->json([
            'error' => false,
            "message" => "All merchants",
            "data" => $merchants
        ]);
    }
    
    /**
    * Export to excel
    */
    public function exportExcel(Request $request)
    {
        return Excel::download(new ProductExportReport($request), 'orderreport.xlsx');
    }

    public function exportCustomerExcel(Request $request)
    {
        return Excel::download(new CustomerExportReport($request), 'customerreport.xlsx');
    }

    public function exportOrderExcel(Request $request)
    {
        return Excel::download(new OrderExportReport($request), 'orderreport.xlsx');
    }

    public function exportProductExcel(Request $request)
    {
        return Excel::download(new ProductReportExport($request), 'productreport.xlsx');
    }

    public function exportProduct(Request $request)
    {
        return Excel::download(new ProductReport($request), 'productreport.xlsx');
    }

}
