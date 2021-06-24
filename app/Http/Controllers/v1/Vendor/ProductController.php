<?php

namespace App\Http\Controllers\v1\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Imports\ProductImport;
use App\Exports\ProductExport;
use App\Models\Category;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use App\Responser\JsonResponser;

class ProductController extends Controller
{
    public function getDownload()
    {
        return Excel::download(new ProductExport(), 'template.xlsx');
    }



    public function importProducts(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls',
        ]);

        if ($validator->fails()) {
            return JsonResponser::send(true, 'Incorrect file format uploaded', null);
        }

        $import = new ProductImport;
        Excel::import($import, $request->file);


        return JsonResponser::send(false, 'Product successfully uploaded', []);
    }

    /**
     * validation
     */
    public function validateProduct(Request $request)
    {
        $rules = [
            'cat_id' => 'required|integer|gt:0',
            'sub_cat_id' => 'integer|nullable|gt:0',
            'child_id' => 'integer|nullable|gt:0',
            'product_name' => 'required|string|min:3|max:250',
            'product_description' => 'required|string|min:5',
            'available_quantity' => 'required|integer|gt:0',
            'production_company' => 'required|max:250',
            "brand_name" => "string|nullable|max:250",
            "processing_type" => "string|nullable|max:250",
            "product_material" => "string|nullable|max:250",
            "product_weight" => "string|nullable",
            "tags" => "string|nullable|max:250",
            "size" => "string|nullable",
            "single_package_size" => "string|nullable",
            'new_price' => 'required|numeric',
            'old_price' => 'numeric',
            "product_image" => "required|array",
            "product_image.*" => "image|mimes:jpeg,jpg,png,gif,JPEG,JPG,PNG,GIF|max:2048"
        ];
        if ($request->isMethod('put')) {
            $rules["product_image"] = "array";
        }

        $validateProduct = Validator::make($request->all(), $rules);
        return $validateProduct;
    }



    /**
     * Store a single product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validateProduct($request);
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            return JsonResponser::send(true, 'Validation Failed', $validate->errors()->all());
        }

        try {
            if (!empty($request->old_price)) {
                $oldprice = $request->old_price;
            } else {
                $oldprice = '0.00';
            }

            $images = [];
            if ($files = $request->file('product_image')) {
                foreach ($files as $file) {
                    $uniqueId = rand(10, 100000);
                    $name               = $uniqueId . '_' . date("Y-m-d") . '_' . time();
                    $imageName = $file->storeOnCloudinaryAs("product", $name)->getSecurePath();
                    $images[]           = $imageName;
                }
            }

            $product = Product::create([
                'cat_id'  => $request->cat_id,
                'sub_cat_id'  => $request->sub_cat_id,
                'child_id' => $request->child_id,
                'user_id' => auth()->user()->id,
                'single_package_size' => $request->single_package_size,
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_brand_name' => $request->brand_name,
                'processing_type' => $request->processing_type,
                'production_company' => $request->production_company,
                'product_material' => $request->product_material,
                'product_weight' => $request->product_weight,
                'tags' => $request->tags,
                'size' => $request->size,
                'estimated_time' => $request->estimated_time,
                'available_quantity' => $request->available_quantity,
                'old_price' => $oldprice,
                'new_price' => $request->new_price,
                "shipping_fee" => $request->shipping_fee,
                'product_image' =>  implode("|", $images),
            ]);
            return JsonResponser::send(false, 'Product Saved Successfully!', $product);
        } catch (\Exception $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal Server error', []);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->where("user_id", auth()->user()->id)->with('category')->with('subcategory')->with('children')->with('user')->first();

        if (!$product) {
            return JsonResponser::send(true, 'Product Not Found', null);
        }

        return JsonResponser::send(false, '', $product);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return JsonResponser::send(true, 'Product Not Found', null);
        }

        if ($product->user_id != auth()->user()->id) {
            return JsonResponser::send(true, 'Access Denied', null, 403);
        }

        /**
         * Validate Request
         */
        $validate = $this->validateProduct($request);
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            return JsonResponser::send(true, 'Validation failed', $validate->errors()->all());
        }


        try {

            $images = $product->product_image;

            if ($files = $request->file('product_image')) {
                $imagesArr = [];
                foreach ($files as $file) {
                    $uniqueId = bin2hex(openssl_random_pseudo_bytes(9));
                    $name = $uniqueId . '_' . date('Y-m-d') . '_' . time();
                    $imageName = $file->storeOnCloudinaryAs('product', $name)->getSecurePath();
                    $imagesArr[] = $imageName;
                }
                $images = implode('|', $imagesArr);
            }


            if (!empty($request->old_price)) {
                $oldprice = $request->old_price;
            } else {
                $oldprice = '0.00';
            }
            $product->update([
                'cat_id'                        => $request->cat_id,
                'sub_cat_id'                    => $request->sub_cat_id,
                'child_id'                      => $request->child_id,
                'product_name'                  => $request->product_name,
                'product_description'           => $request->product_description,
                'product_brand_name'            => $request->brand_name,
                'processing_type'               => $request->processing_type,
                'production_company'            => $request->production_company,
                'product_material'              => $request->product_material,
                'product_weight'                => $request->product_weight,
                'tags'                          => $request->tags,
                'available_quantity'            => $request->available_quantity,
                'old_price'                     => $oldprice,
                'new_price'                     => $request->new_price,
                'in_stock' => $request->available_quantity > 0 ? 1 : 0,
                'product_image' => $images
            ]);

            return JsonResponser::send(false, 'Product Updated Successfully!', $product);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal Server error', null, 500);
        }
    }

    /**
     * Remove image from cloudinary
     */
    protected function deleteFile($file)
    {
        $images = explode("|", $file);

        foreach ($images as $cloudImage) {
            $fileName = explode(".", implode("", array_slice(explode("/", $cloudImage), -1)))[0];
            $productId = "product/" . $fileName;
            cloudinary()->destroy($productId);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return JsonResponser::send(true, 'Product not found', null);
        }

        if ($product->user_id != auth()->user()->id) {
            return JsonResponser::send(true, 'Access Denied :(', null, 403);
        }
        // delete old product images
        $this->deleteFile($product->product_image);

        $product->forceDelete();
        return JsonResponser::send(false, 'Product deleted successfully', null);
    }

    public function vendorProducts()
    {
        $products = Product::where("user_id", auth()->user()->id)->with('category')->with('subcategory')->with('children')->paginate(10);

        return JsonResponser::send(false, $products->count() . ' Products Found', $products);
    }

    /**
     * Activate Product
     */

    public function activate($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return JsonResponser::send(true, 'Product not found', null);
        }
        /** if Product is found */

        if ($product->user_id != auth()->user()->id) {
            return JsonResponser::send(true, 'Access Denied', null, 403);
        }
        try {

            $product->update([
                'is_active' => 1,
            ]);

            return JsonResponser::send(false, 'Product Activated Successfully!', $product);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal Server error', [], 500);
        }
    }

    /**
     * Deactivate Product
     */
    public function deactivate($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return JsonResponser::send(true, 'Product not found', null);
        }

        if ($product->user_id != auth()->user()->id) {
            return JsonResponser::send(true, 'Access Denied', [], 403);
        }

        try {
            $product->update([
                'is_active' => 0,
            ]);

            return JsonResponser::send(false, 'Product Deactivated Successfully!', $product);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal Server error', null, 500);
        }
    }

    public function vendorProductStat()
    {
        $products = Product::where('is_active', 1)->where('user_id', Auth::id())->count();
        $deactivatedProducts = Product::where('is_active', 0)->where('user_id', Auth::id())->count();
        $activatedProducts = Product::where('is_active', 1)->where('user_id', Auth::id())->count();
        $categories = Category::count();

        $data = [
            'totalProducts' => $products,
            'deactivatedProducts' => $deactivatedProducts,
            'activatedProducts' => $activatedProducts,
            'categories' => $categories
        ];
        return JsonResponser::send(false, 'Product Data', $data);
    }

    /**
     * Popular Products
     */
    public function popularvendorProduct()
    {
        $popularproducts = Product::where('user_id', Auth::id())->orderBy('views', 'DESC')->with('category')->with('subcategory')->limit(6)->get();

        return JsonResponser::send(false, '', $popularproducts);
    }

    /**
     * Get Products by status
     */
    public function productByStatus(Request $request, $status)
    {
        $request->merge(['status' => $status]);

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return JsonResponser::send(true, 'Validation Failed', $validator->errors()->all());
        }

        $status = $request->status === "active" ? 1 : 0;

        $products = Product::where("user_id", auth()->user()->id)->where('is_active', $status)->with('category')->with('subcategory')->with('children')->paginate(10);

        return JsonResponser::send(false, $products->count() . ' Products Found', $products);
    }

    public function searchvendorProduct(Request $request)
    {
        try {
            $product = Product::where('user_id', Auth::id())->where('product_name', 'LIKE', "%{$request->search}%")
                ->orWhere('product_description', 'LIKE', "%{$request->search}%")->paginate(12);

            return JsonResponser::send(false, $product->count() . ' Products Found', $product);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal Server error', [], 500);
        }
    }
}
