<?php

namespace App\Http\Controllers\v1;

use App\Models\User;
use Validator, Mail;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\Children;
use App\Mail\ContactEmail;
use App\Models\SubCategory;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->where('is_active', true)->with('category')->with('subcategory')->take(9)->get();
        $featuredproducts = Product::where('featured', '1')->where('is_active', true)->orderBy('id', 'DESC')->with('category')->with('subcategory')->take(6)->get();
        $bestsellerproducts = OrderDetails::select('product_id')->groupBy('product_id')->orderByRaw('COUNT(*) DESC')->with('product')->limit(6)->get();
        $categories = Category::all();
        $subcategories = SubCategory::with('category')->get();
        $childrencategories = Children::with('category', 'subcategory')->get();
        $data = [
            'products' => $products,
            'featuredproducts' => $featuredproducts,
            'bestsellerproducts' => $bestsellerproducts,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'childrencategories' => $childrencategories
        ];

        return view('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->where('is_active', true)->with('category', 'subcategory', 'children', 'review', 'user')->first();
        if (!$product) {
            return response()->json([
                'error' => true,
                'message' => 'Product Not Found',
                'data' => null
            ], 404);
        }
        // update views count
        $product->increment('views');

        $relatedproduct = Product::where('cat_id', $product->cat_id)->orWhere("sub_cat_id", $product->sub_cat_id)->where("id", "!=", $id)->with('category', 'subcategory', 'children', 'review', 'user')->take(6)->get();
        $data = [
            'product' => $product,
            'relatedproduct' => $relatedproduct
        ];
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $data,
        ], 200);
    }

    /**
     * Get Products by Category
     */
    public function catProduct($category)
    {
        $products = Product::where('cat_id', $category)->where("is_active", true)->with('category', 'subcategory', 'children', 'review', 'user')->orderBy('created_at', 'DESC')->paginate(12);
        if (count($products) > 0) {
            return response()->json([
                'error' => false,
                'message' => null,
                'data' => $products,
            ], 200);
        } else {
            return response()->json([
                'error' => false,
                'message' => 'No available Product',
                'data' => null,
            ], 200);
        }
    }

    /**
     * Get Products by Sub Category
     */
    public function subcatProduct($subcategory)
    {
        $products = Product::where('sub_cat_id', $subcategory)->with('category', 'subcategory', 'children', 'review', 'user')->orderBy('created_at', 'DESC')->paginate(12);
        if (count($products) > 0) {
            return response()->json([
                'error' => false,
                'message' => null,
                'data' => $products,
            ], 200);
        } else {
            return response()->json([
                'error' => false,
                'message' => 'Product Not Found',
                'data' => null,
            ], 200);
        }
    }

    /**
     * Search Products
     */
    public function searchProduct(Request $request)
    {
        $products = Product::orderBy('created_at', 'DESC')
            ->where('products.product_name', 'LIKE', "%{$request->search}%")
            ->orWhere('products.product_description', 'LIKE', "%{$request->search}%")
            ->orWhere('products.product_brand_name', 'LIKE', "%{$request->search}%")
            ->orWhereHas('category', function ($query) use ($request) {
                $query->where('cat_name', "LIKE", "%{$request->search}%");
            })
            ->orWhereHas('subcategory', function ($query) use ($request) {
                $query->where('sub_cat_name', "LIKE", "%{$request->search}%");
            })
            ->with('category')
            ->with('subcategory')
            ->paginate(12);
        if (count($products) > 0) {
            return response()->json([
                'error' => false,
                'message' => null,
                'data' => $products,
            ], 200);
        } else {
            return response()->json([
                'error' => false,
                'message' => 'Product Not Found',
                'data' => null,
            ], 200);
        }
    }


    /**
     * Filter Products
     */
    public function filterProduct(Request $request)
    {
        /**
         * Validate Request
         */
        $validate = $this->validateFilter($request->all());
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validate->errors()->all(),
                'data' => null
            ], 400);
        }

        // popularity, latest,price:lowest -highest, highest - lowest

        // by latest or null
        if (!$request->sort || $request->sort === "latest") {
            $sortBy = "created_at";
            $orderBy = "desc";
        }
        // by popularity
        if ($request->sort === "popularity") {
            $sortBy = "views";
            $orderBy = "desc";
        }

        // by price lowest to highest
        if ($request->sort === "pricelh") {
            $sortBy = "new_price";
            $orderBy = "asc";
        }

        // by price  highest to lowest
        if ($request->sort === "pricehl") {
            $sortBy = "new_price";
            $orderBy = "desc";
        }


        $products = Product::where(function ($query) use ($request) {
            return $request->cat_id ?
                $query->where('cat_id', $request->cat_id) : '';
        })->where(function ($query) use ($request) {
            return $request->sub_cat_id ?
                $query->where('sub_cat_id', $request->sub_cat_id) : '';
        })->where(function ($query) use ($request) {
            return $request->startprice ?
                $query->whereBetween('new_price', [$request->startprice, $request->endprice]) : '';
        })->where(function ($query) use ($request) {
            return $request->merchant_id ?
                $query->where('user_id', $request->merchant_id) : '';
        })->orderBy($sortBy, $orderBy)->with('category', 'subcategory', 'children', 'review')->paginate(12);

        if (count($products) > 0) {
            return response()->json([
                'error' => false,
                'message' => null,
                'data' => $products,
            ], 200);
        } else {
            return response()->json([
                'error' => false,
                'message' => 'Product Not Found',
                'data' => null,
            ], 200);
        }
    }

    /**
     * Get All Categories
     */
    public function categories()
    {
        $categories = Category::with("subcategory")->get();

        return response()->json([
            'error' => false,
            'message' => $categories->count(),
            'data' => $categories
        ], 200);
    }

    /**
     * Get Categories with products
     */
    public function categoriesWithProducts()
    {
        $categories = Category::with(["product" => function ($query) {
            $query->where('is_active', true)->inRandomOrder()->take(4);
        }])->paginate(12);

        return response()->json([
            'error' => false,
            'message' => "",
            'data' => $categories
        ], 200);
    }

    /**
     * Get all active vendors
     */
    public function vendors()
    {
        $role = 'merchant';
        $vendors = User::where("is_active", 1)->whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', $role)->where('name', '!=', 'admin');
        })->withCount("product")->paginate(12);
        if (!$vendors) {
            return response()->json([
                'error' => true,
                'message' => 'Record not found',
                'data' => null
            ]);
        }
        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $vendors
        ]);
    }

    /**
     * Recommend products to user
     */
    public function recommendProducts(Request $request)
    {
        /**
         * Validate Request
         */
        $validate = $this->validateRecommendation($request->all());
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validate->errors()->all(),
                'data' => null
            ], 400);
        }
        $relatedproduct = Product::where('is_active', 1)->where("in_stock", 1)
            ->where(function ($query) use ($request) {
                return $request->product_id ?
                    $query->where('id', "!=", $request->product_id) : '';
            })->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    return $request->cat_id ?
                        $query->where('cat_id', $request->cat_id) : '';
                })->orWhere(function ($query) use ($request) {
                    return $request->sub_cat_id ?
                        $query->where('sub_cat_id', $request->sub_cat_id) : '';
                });
            })->with('category')->with('subcategory')->with('review')
            ->with("user")->inRandomOrder()->take(6)->get();

        return response()->json([
            'error' => false,
            'message' => null,
            'data' => $relatedproduct,
        ], 200);
    }

    /**
     * validation
     */
    protected function validateRecommendation($request)
    {
        $rules = [
            'product_id' => 'nullable|integer|gt:0',
            'cat_id' => 'nullable|integer|gt:0',
            'sub_cat_id' => 'nullable|integer|gt:0',
        ];
        $validateProduct = Validator::make($request, $rules);
        return $validateProduct;
    }

    /**
     * validation
     */
    protected function validateFilter($request)
    {
        $rules = [
            'merchant_id' => 'nullable|integer|gt:0',
            'cat_id' => 'nullable|integer|gt:0',
            'sub_cat_id' => 'nullable|integer|gt:0',
            'startprice' => 'nullable|integer|gt:0',
            'endprice' => 'nullable|integer|gt:0',
            'sort' => 'nullable|string|in:popularity,latest,pricelh,pricehl',
        ];
        $validateProduct = Validator::make($request, $rules);
        return $validateProduct;
    }

    /**
     * handle contact us.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request)
    {
        /**
         * Validate Data
         */
        $validate = $this->validateContactUs($request);

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

        $data = [
            "email" => $request->email,
            "fullname" => $request->fullname,
            "phoneno" => $request->phoneno,
            "message" => $request->message,
        ];

        $mailto = env("CONTACT_US_MAIL");

        Contact::create($data);

        Mail::to($mailto)->send(new ContactEmail($data));

        return response()->json([
            'error' => false,
            'message' => 'Message Sent! We will get back to you shortly.',
            'data' => null
        ], 201);
    }

    /**
     * Validate Contact us form Request
     */
    public function validateContactUs($request)
    {
        $rules = [
            "email" => "required|email",
            "fullname" => "required",
            "phoneno" => "required|min:10|max:12",
            "message" => "required",
        ];
        $validateContactUs = Validator::make($request->all(), $rules);
        return $validateContactUs;
    }
}
