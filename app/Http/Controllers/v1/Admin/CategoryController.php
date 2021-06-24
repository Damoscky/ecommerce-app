<?php

namespace App\Http\Controllers\v1\Admin;

use Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Responser\JsonResponser;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::orderBy('cat_name', 'ASC')->get();

        toastr()->success($categories->count() . ' Categor(ies) Available');
        return view('admin.all-categories', compact('categories'));
    }

    /**
     * Create Category Route
     */
    public function createCategory()
    {
        return view('admin.create-category');
    }


    public function getAllCategory()
    {

        $categories = Category::orderBy('cat_name', 'ASC')->get();

        return JsonResponser::send(false, $categories->count() . ' Categor(ies) Available', $categories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $this->validateCategory($request);

        if ($validate->fails()) {

            toastr()->error($validate->errors()->all()[0], 'Validation Failed');
            return back();
        }
        try {

            $category = Category::create([
                'cat_name' => $request->category_name,
                "slug" => Str::slug($request->category_name),
                'created_by' => auth()->user()->id,
            ]);
            toastr()->success('Category created Successfully!', 'Created!');
            return back();
        } catch (\Throwable $th) {
            logger($th);
            toastr()->error('Internal Server Error', 'Internal Server Error!');
            return back();
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
        $category = Category::where('id', $id)->with('subcategory')->with('product')->with('children')->first();
        if (!$category) {
            toastr()->error('Record not found!');
            return back();
        }
        toastr()->success('Record found Successfully!', compact('category'));
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
        $category = Category::find($id);

        if (!$category) {
            toastr()->error('Record Not Found');
            return back();
        }
        /**
         * Validate Request
         */
        $validate = $this->validateCategory($request);

        if ($validate->fails()) {
            toastr()->error('Validation failed');
            return back();
        }
        try {

            $category->update([
                'cat_name' => $request->category_name,
                "slug" => Str::slug($request->category_name)
            ]);

            toastr()->success('Category Updated Successfully');
            return back();
        } catch (\Throwable $th) {
            logger($th);
            toastr()->error('Internal Server Error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            toastr()->error('Record Not Found');
            return back();
        }
        try {

            //check if category has been attached to a product
            $categoryProduct = Product::where('cat_id', $id)->get();
            if(count($categoryProduct) > 0){
                toastr()->warning('Category can not be deleted because it has been attached to a product', 'Validation Error!');
                return back();
            }
            $category->delete();

            toastr()->success('Category deleted successfully', 'Successfully!');
            return redirect()->route('admin.categories');
        } catch (\Throwable $th) {
            logger($th);
            toastr()->error('Internal server error');
            return back();        }
    }

    /**
     * Validate Category Request
     */
    public function validateCategory(Request $request)
    {
        if ($request->isMethod('put')) {
            $rules = [

                'category_name' => 'required|unique:categories,cat_name,' . $request->id . ",id",
            ];
        } else {
            $rules = [

                'category_name' => 'required|unique:categories,cat_name'
            ];
        }

        $validateCategory = Validator::make($request->all(), $rules);
        return $validateCategory;
    }

    /**
     * Activate Category
     */
    public function activate($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }
        try {
            $category->update([
                'is_active' => 1,
            ]);

            return JsonResponser::send(false, 'Category Activated Successfully!', $category);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }

    /**
     * Deactivate Category
     */
    public function deactivate($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        try {
            $subcategories = SubCategory::where('cat_id', $id)->get();
            foreach ($subcategories as $key => $subcategory) {
                $subcategory->update([
                    'is_active' => 0,
                ]);
            }

            $category->update([
                'is_active' => 0,
            ]);

            return JsonResponser::send(false, 'Category Deactivated Successfully!', $category);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }

    /**
     * Search Category
     */
    public function searchCategory(Request $request)
    {
        try {
            $category = Category::where('cat_name', 'LIKE', "%{$request->search}%")->paginate(12);

            return JsonResponser::send(false, '', $category);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }
}
