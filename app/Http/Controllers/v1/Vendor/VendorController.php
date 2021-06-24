<?php

namespace App\Http\Controllers\v1\Vendor;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Responser\JsonResponser;

class VendorController extends Controller
{

    /**
     * Dashboard
     */
    public function dashboard()
    {
        try {
            $totalOrders = OrderDetails::where('merchant_id', auth()->user()->id)->whereNotNull('status')->orderBy('id', 'DESC')->count();
            $pendingOrders = OrderDetails::where('merchant_id', auth()->user()->id)->where('status', 'Pending')->orderBy('id', 'DESC')->count();
            $cancelledOrders = OrderDetails::where('merchant_id', auth()->user()->id)->where('status', 'Cancelled')->orderBy('id', 'DESC')->count();
            $completedOrders = OrderDetails::where('merchant_id', auth()->user()->id)->where('status', 'Completed')->orderBy('id', 'DESC')->count();
            $todayRevenue = OrderDetails::select(DB::raw('sum(unit_price * quantity_ordered) as total'))->Where('merchant_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->get();
            $totalRevenue = OrderDetails::select(DB::raw('sum(unit_price * quantity_ordered) as total'))->Where('merchant_id', auth()->user()->id)->get();
            $totalSale = OrderDetails::where('merchant_id', auth()->user()->id)->count();
            $recentOrder = OrderDetails::where('merchant_id', auth()->user()->id)->latest()->orderBy("created_at", "DESC")->limit(7)->get();
            $totalViews = Product::where('user_id', auth()->user()->id)->sum('views');
            $totalProducts = Product::where('user_id', auth()->user()->id)->count();
            $totalCustomers =  OrderDetails::where('merchant_id', auth()->user()->id)->distinct("user_id")->count();


            $currentyear = Carbon::now()->year;

            $januarySales = OrderDetails::where('merchant_id', auth()->user()->id)->whereMonth('created_at', '01')->whereYear('created_at', $currentyear)->sum('unit_price');
            $februarySales = OrderDetails::where('merchant_id', auth()->user()->id)->whereMonth('created_at', '02')->whereYear('created_at', $currentyear)->sum('unit_price');
            $marchSales = OrderDetails::where('merchant_id', auth()->user()->id)->whereMonth('created_at', '03')->whereYear('created_at', $currentyear)->sum('unit_price');
            $aprilSales = OrderDetails::where('merchant_id', auth()->user()->id)->whereMonth('created_at', '04')->whereYear('created_at', $currentyear)->sum('unit_price');
            $maySales = OrderDetails::where('merchant_id', auth()->user()->id)->whereMonth('created_at', '05')->whereYear('created_at', $currentyear)->sum('unit_price');
            $juneSales = OrderDetails::where('merchant_id', auth()->user()->id)->whereMonth('created_at', '06')->whereYear('created_at', $currentyear)->sum('unit_price');
            $julySales = OrderDetails::where('merchant_id', auth()->user()->id)->whereMonth('created_at', '07')->whereYear('created_at', $currentyear)->sum('unit_price');
            $augustSales = OrderDetails::where('merchant_id', auth()->user()->id)->whereMonth('created_at', '08')->whereYear('created_at', $currentyear)->sum('unit_price');
            $septemberSales = OrderDetails::where('merchant_id', auth()->user()->id)->whereMonth('created_at', '09')->whereYear('created_at', $currentyear)->sum('unit_price');
            $octoberSales = OrderDetails::where('merchant_id', auth()->user()->id)->whereMonth('created_at', '10')->whereYear('created_at', $currentyear)->sum('unit_price');
            $novemberSales = OrderDetails::where('merchant_id', auth()->user()->id)->whereMonth('created_at', '11')->whereYear('created_at', $currentyear)->sum('unit_price');
            $decemberSales = OrderDetails::where('merchant_id', auth()->user()->id)->whereMonth('created_at', '07')->whereYear('created_at', $currentyear)->sum('unit_price');
            $totalEarnings = [
                "January revenue" => $januarySales,
                "February revenue" => $februarySales,
                "March revenue" => $marchSales,
                "April revenue" => $aprilSales,
                "May revenue" => $maySales,
                "June revenue" => $juneSales,
                "July revenue" => $julySales,
                "August revenue" => $augustSales,
                "September revenue" => $septemberSales,
                "October revenue" => $octoberSales,
                "November revenue" => $novemberSales,
                "December revenue" => $decemberSales
            ];

            $data = [
                'todayRevenue' => $todayRevenue,
                'totalRevenue' => $totalRevenue,
                'totalSales' => $totalSale,
                'totalVisitor' => $totalViews,
                'totalEarnings' => $totalEarnings,
                'cancelledOrders' => $cancelledOrders,
                'pendingOrders' => $pendingOrders,
                'totalOrders' => $totalOrders,
                'orderCompleted' => $completedOrders,
                "recentOrders" => $recentOrder,
                "totalProducts" => $totalProducts,
                "totalCustomer" => $totalCustomers,
                "user" => auth()->user()
            ];
            return JsonResponser::send(false, '', $data);
        } catch (\Throwable $th) {
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }


    public function update(Request $request)
    {
        $credentials = $request->only('firstname', 'lastname', 'phoneno', 'image');
        $user = auth()->user();
        try {
            if (empty($request->image)) {
                $profilePic = $user->image;
            } else {
                $file = $request->file("image");
                $uniqueId = rand(10, 100000);
                $name  = $uniqueId . '_' . date("Y-m-d") . '_' . time();
                $profilePic = $file->storeOnCloudinaryAs("profile_pics", $name)->getSecurePath();
            }

            $user->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phoneno' => $request->phoneno,
                'image' => $profilePic,
            ]);

            return JsonResponser::send(false, 'Record updated successfully', $user);
        } catch (\Exception $th) {
            report($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }
}
