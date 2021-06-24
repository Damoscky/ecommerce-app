<?php

namespace App\Http\Controllers\v1\Filter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Auth;
// use App\Models\

class FilterController extends Controller
{
    public function vendorordersFilter(Request $request){
        // return OrderDetails::all();
        if(isset($request->status)){
            $result = OrderDetails::where('status', $request->status)->paginate(10);
            return response()->json([
				'error' => false,
				'message' => null,
				'data' => $result
			]);
        }
        elseif(isset($request->category)){
            $result = OrderDetails::where('cat_id', $request->category)->paginate(10);
            return response()->json([
				'error' => false,
				'message' => null,
				'data' => $result
			]);
        }
        elseif(isset($request->subcategory)){
            $result = OrderDetails::where('sub_cat_id', $request->category)->paginate(10);
            return response()->json([
				'error' => false,
				'message' => null,
				'data' => $result
			]);
        }
    }

    public function vendorproductsFilter(Request $request){
        // return OrderDetails::all();
        if(isset($request->status)){
            $result = Product::where('is_active', $request->status)->where('user_id', Auth::id())->paginate(10);
            return response()->json([
				'error' => false,
				'message' => null,
				'data' => $result
			]);
        }
        elseif(isset($request->category)){
            $result = Product::where('cat_id', $request->category)->paginate(10);
            return response()->json([
				'error' => false,
				'message' => null,
				'data' => $result
			]);
        }
        elseif(isset($request->subcategory)){
            $result = Product::where('sub_cat_id', $request->sub_category)->paginate(10);
            return response()->json([
				'error' => false,
				'message' => null,
				'data' => $result
			]);
        }
    }

    

   
    

    
    //Admin filter
    public function ordersFilter(Request $request){
        // return OrderDetails::all();
        if(isset($request->status)){
            $result = OrderDetails::where('status', $request->status)->paginate(10);
            return response()->json([
				'error' => false,
				'message' => null,
				'data' => $result
			]);
        }
    }

    public function productsFilter(Request $request){
        // return OrderDetails::all();
        if(isset($request->status)){
            $result = Product::where('is_active', $request->status)->paginate(10);
            return response()->json([
				'error' => false,
				'message' => null,
				'data' => $result
			]);
        }
    }

    public function categoriesFilter(Request $request){
        // return OrderDetails::all();
        if(isset($request->status)){
            $result = Category::where('is_active', $request->status)->paginate(10);
            return response()->json([
				'error' => false,
				'message' => null,
				'data' => $result
			]);
        }
    }

    public function subcategoriesFilter(Request $request){
        // return OrderDetails::all();
        if(isset($request->status)){
            $result = SubCategory::where('is_active', $request->status)->paginate(10);
            return response()->json([
				'error' => false,
				'message' => null,
				'data' => $result
			]);
        }
    }

    public function merchantsFilter(Request $request){
        $role = 'merchant';
        $merchants = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', '=', $role);
        })->where('is_active', $request->status)->orderBy('firstname')->paginate(10);
        return response()->json([
            'error' => false,
            "message" => "All merchants",
            "data" => $merchants
        ]);
    }

    public function customersFilter(Request $request){
        $role = 'customer';
        $merchants = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', '=', $role);
        })->where('is_active', $request->status)->orderBy('firstname')->paginate(10);
        return response()->json([
            'error' => false,
            "message" => "All customers",
            "data" => $merchants
        ]);
    }

    
}
