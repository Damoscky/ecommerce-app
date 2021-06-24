<?php

namespace App\Http\Controllers\v1\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Responser\JsonResponser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{


    /**
     * Create Sub Category Route
     */
    public function createSubCategory()
    {
        $categories = Category::orderBy('cat_name', 'ASC')->get();
        return view('admin.create-sub-category', compact('categories'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::with('category', 'children')->orderBy('sub_cat_name', 'ASC')->get();

        toastr()->success($subCategories->count() . ' Subcategor(ies) Available');
        return view('admin.all-sub-categories', compact('subCategories'));
    }

    //get all sub ctegory
    public function getAllSubCategory()
    {
        $subCategories = SubCategory::with('category', 'children')->orderBy('sub_cat_name', 'ASC')->get();

        return JsonResponser::send(false, $subCategories->count() . ' Subcategor(ies) Available', $subCategories);
    }

    /**
     * Get Subcategory by category Id
     */
    public function getSubCatByCatId($catId)
    {
        $subCategories = SubCategory::with('category', 'children')->where('cat_id', $catId)->orderBy('sub_cat_name', 'ASC')->get();

        if(!$subCategories){
            return JsonResponser::send(true, 'Record not found', []);
        }

        return JsonResponser::send(false, $subCategories->count() . ' Subcategor(ies) Available', $subCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validateSubcategory($request);

        if ($validate->fails()) {
            toastr()->error($validate->errors()->all()[0], 'Validation Failed');
            return back();
        }

        try {
            $subCategory = SubCategory::create([
                'cat_id' => $request->cat_id,
                'sub_cat_name' => $request->sub_cat_name,
                "slug" => Str::slug($request->sub_cat_name),
                'created_by' => auth()->user()->id,
            ]);
            toastr()->success('Sub Category Created Successfully!', 'Created!');
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
        $subcategory = SubCategory::where('id', $id)->with('category')->with('product')->with('children')->with(["creator" => function ($query) {
            $query->select("id", "firstname", "lastname");
        }])->first();

        if (!$subcategory) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        return JsonResponser::send(false, '', $subcategory);
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
        $subcategory = SubCategory::find($id);

        if (!$subcategory) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        $validate = $this->validateSubcategory($request);

        if ($validate->fails()) {
            return JsonResponser::send(true, 'Validation Failed', $validate->errors()->all());
        }

        try {

            $subcategory->update([
                'cat_id' => $request->cat_id,
                'sub_cat_name' => $request->sub_cat_name,
                "slug" => Str::slug($request->sub_cat_name)
            ]);

            return JsonResponser::send(false, 'SubCategory Updated Successfully!', $subcategory);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
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
        $subcategory = SubCategory::find($id);

        if (!$subcategory) {
            toastr()->error('Record Not Found');
            return back();
        }

        try {
            $subcategoryProduct = Product::where('sub_cat_id', $id)->get();
            if(count($subcategoryProduct) > 0){
                toastr()->warning('Sub Category can not be deleted because it has been attached to a product', 'Validation Error!');
                return back();
            }

            $subcategory->delete();

            toastr()->success('Sub Category deleted successfully', 'Successfully!');
            return redirect()->route('admin.subcategories');
        } catch (\Throwable $th) {
            logger($th);
            toastr()->error('Internal server error');
            return back();
        }
    }


    /**
     * Validate Subcategory Request
     */
    public function validateSubcategory(Request $request)
    {
        if ($request->isMethod('put')) {
            $rules = [
                'cat_id' => 'required',
                'sub_cat_name' => 'required|unique:sub_categories,sub_cat_name,' . $request->id,
            ];
        } else {
            $rules = [
                'cat_id' => 'required',
                'sub_cat_name' => 'required|unique:sub_categories'
            ];
        }

        $validateSubcategory = Validator::make($request->all(), $rules);
        return $validateSubcategory;
    }

    /**
     * Activate Sub Category
     */
    public function activate($id)
    {
        $subCategory = SubCategory::find($id);

        if (!$subCategory) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        try {
            $subCategory->update([
                'is_active' => 1,
            ]);

            return JsonResponser::send(false, 'Subcategory Activated Successfully!', $subCategory);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }

    /**
     * Deactivate Sub Category
     */
    public function deactivate($id)
    {
        $subCategory = SubCategory::find($id);

        if (!$subCategory) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        try {
            $subCategory->update([
                'is_active' => 0,
            ]);

            return JsonResponser::send(false, 'Subcategory dectivated Successfully!', $subCategory);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }

    /**
     * Search SubCategory
     */
    public function searchCategory(Request $request)
    {
        try {
            $subcategory = SubCategory::where('sub_cat_name', 'LIKE', "%{$request->search}%")->paginate(12);

            return JsonResponser::send(false, '', $subcategory);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }
}
