<?php

namespace App\Http\Controllers\v1\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Validator;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->user()->id)->where('status', 1)->with('product')->get();

        return response()->json([
            'success' => true,
            'message' => $wishlists->count() . ' Item(s) Found',
            'data' => $wishlists
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
        $validate = $this->validateWishlist($request);
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validate->errors()->all(),
                "data" => null
            ], 400);
        }
        /**
         * if validate pass, save Wishlist
         */
        $checkwishlists = Wishlist::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->first();
        if ($checkwishlists) {
            return response()->json([
                'error' => true,
                'message' => 'Item Already in Wishlist',
                'data' => $checkwishlists
            ], 200);
        }

        $totalprice = $request->quantity * $request->price;

        $wishlist = Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'total_price' => $totalprice,
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Item added to Wishlist!',
            'data' => $wishlist
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::where('product_id', $id)->where('user_id', auth()->user()->id)->first();
        if (!$wishlist) {
            return response()->json([
                'error' => true,
                'message' => 'Wishlist not found',
                'data' => null
            ], 404);
        }
        $wishlist->delete();

        return response()->json([
            'error' => false,
            'message' => 'Item Removed from Wishlist!',
            'data' => null
        ], 200);
    }

    /**
     * Validate Wishlist Request
     */
    public function validateWishlist($request)
    {
        $rules = [
            'product_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ];
        $validateWishlist = Validator::make($request->all(), $rules);
        return $validateWishlist;
    }
}
