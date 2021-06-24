<?php

namespace App\Http\Controllers\v1\Admin;

use Validator;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Responser\JsonResponser;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * List all Brand
     */
    public function index()
    {
        try {
            $brands = Brand::with('creator', 'product')->orderBy('brand_name', 'ASC')->get();
            if(!$brands){
                return JsonResponser::send(true, 'Record not found', []);
            }
            return JsonResponser::send(false, 'Record found successfully', $brands);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }

    /**
     * Create Brands
     */
    public function store(Request $request)
    {
        $validate = $this->validateBrand($request);

        if ($validate->fails()) {
            return JsonResponser::send(true, 'Validation Failed', $validate->errors()->all());
        }
        try {

            $brand = Brand::create([
                'brand_name' => $request->brand_name,
                "slug" => Str::slug($request->slug),
                'created_by' => auth()->user()->id,
            ]);
            return JsonResponser::send(false, 'Brand created Successfully!', $brand);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::where('id', $id)->with('creator', 'product')->first();
        if (!$brand) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }
        return JsonResponser::send(false, 'Record Found Successfully', $brand);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }
        try {
            //check if brand has product
            $brandProducts = Product::where('brand_id', $id)->get();
            if(count($brandProducts) > 0){
                return JsonResponser::send(true, 'Brand cannot be deleted because it has already been attached to a Product', null, 404);
            }

            $brand->delete();

            return JsonResponser::send(false, 'Brand deleted successfully', null);
        } catch (\Throwable $th) {
            logger($th);
            return $th->getMessage();
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }

    /**
     * Validate Brand Request
     */
    public function validateBrand(Request $request)
    {
        if ($request->isMethod('put')) {
            $rules = [

                'brand_name' => 'required|unique:brands,brand_name,' . $request->brand_id . ",id",
            ];
        } else {
            $rules = [

                'brand_name' => 'required|unique:brands,brand_name'
            ];
        }

        $validateBrand = Validator::make($request->all(), $rules);
        return $validateBrand;
    }

    /**
     * Search Brand
     */
    public function searchBrand(Request $request)
    {
        try {
            $brands = Brand::with('creator', 'product')->where('brand_name', 'LIKE', "%{$request->search}%")->paginate(12);

            if(!$brands){
                return JsonResponser::send(true, 'Record Not Found Successfully', []);
            }

            return JsonResponser::send(false, 'Record found successfully', $brands);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }
}
