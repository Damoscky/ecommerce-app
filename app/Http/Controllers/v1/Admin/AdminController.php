<?php

namespace App\Http\Controllers\v1\Admin;

use Validator;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Children;
use App\Models\SubCategory;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Responser\JsonResponser;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth:web');
    }

    /**
     * Change Vendor Role
     */
    public function changeRole(Request $request)
    {
        try {
            $credentials = $request->all();
            $rules = [
                ['user_id' => 'required'],
                ['role_id' => 'required'],
            ];
            $validatorId = Validator::make($credentials, $rules[0]);
            if ($validatorId->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => 'User is required.',
                    'data' => null
                ]);
            }
            $validatorRole = Validator::make($credentials, $rules[1]);
            if ($validatorRole->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => 'Role is required.',
                    'data' => null
                ]);
            }

            $user = User::find($request->user_id);
            $roleUser = DB::table('role_user')->where('user_id', $user->id)->update([
                'role_id' => $request->role_id,
            ]);
            return response()->json([
                'error' => false,
                'message' => 'User role has been updated',
                'data' => null
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
     * Roles
     */
    protected function userRole()
    {
        $roles = config('roles.models.role')::get();
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $roles
        ]);
    }

    /**
     * Admin Roles
     */
    protected function vendorRole()
    {
        $roles = config('roles.models.role')::where('name', '!=', 'user')->where('name', '!=', 'admin')->get();
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $roles
        ]);
    }

    /**Dashboard */
    public function dashboard()
    {
        try {
            $today = Carbon::today();
            $userRole = 'customer';
            $recentOrders = OrderDetails::latest()->limit(7)->get();
            $recentCustomer = User::latest()->whereHas('roles', function ($q) use ($userRole) {
                $q->where('name', '=', $userRole);
            })->limit(7)->get();
            $todayRevenue = Order::whereDate('created_at', Carbon::today())->sum('total_price');
            $totalRevenue = Order::sum('total_price');
            $orderCompleted = OrderDetails::where('status', 'Received')->count();
            $orderPending = OrderDetails::where('status', 'Pending')->count();
            $orderShipped = OrderDetails::where('status', 'Shipped')->count();
            $orderCancelled = OrderDetails::where('status', 'Cancelled')->count();
            // $orderProcessing = OrderDetails::Where('status', 'Pending')->count();
            $dailyVisitor = Product::sum('views');
            $totalOrder = OrderDetails::count();
            $totalProduct = Product::count();
            $totalUsers = User::whereHas('roles', function ($roleTable) use ($userRole) {
                $roleTable->where('name', $userRole);
            })->count();
            $totalVendors = User::whereHas('roles', function ($roleTable) use ($userRole) {
                $roleTable->where('name', 'merchant');
            })->count();
            $totalCategory = Category::count();
            $totalSubCategory = SubCategory::count();
            $totalChildCategory = Children::count();
            $popularproducts = Product::orderBy('views', 'DESC')->with('category')->with('subcategory')->limit(6)->get();
            $newProducts = Product::latest()->limit(7)->get();
            $data = [
                'dailySales' => $todayRevenue,
                'totalSales' => $totalRevenue,
                'totalOrder' => $totalOrder,
                'recentOrders' => $recentOrders,
                'orderCompleted' => $orderCompleted,
                'orderPending' => $orderPending,
                'orderShipped' => $orderShipped,
                'orderCancelled' => $orderCancelled,
                'dailyVisitor' => $dailyVisitor,
                'totalProduct' => $totalProduct,
                'totalVendor' => $totalVendors,
                'totalCustomer' => $totalUsers,
                'popularProducts' => $popularproducts,
                'newProducts' => $newProducts,
                'recentCustomers' => $recentCustomer,
                'totalCategory' => $totalCategory,
                'totalSubCategory' => $totalSubCategory,
                'totalChildCategory' => $totalChildCategory
            ];

            $admin = Auth::user()->lastname;

            return view('admin.dashboard', compact('data'));
        } catch (\Throwable $th) {
            toastr()->error('Internal server error', 'Internal Server Error!');
            return back();
        }
    }
}
