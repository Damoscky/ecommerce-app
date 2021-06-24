<?php

namespace App\Http\Controllers\v1\Admin;

use App\Models\Category;
use App\Models\Children;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Responser\JsonResponser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ChildrenController extends Controller
{

    /**
     * Create Child Category Route
     */
    public function createChildCategory()
    {
        $categories = Category::orderBy('cat_name', 'ASC')->get();
        $subCategories = SubCategory::orderBy('sub_cat_name', 'ASC')->get();

        return view('admin.create-child-category', compact('categories', 'subCategories'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childCategories = Children::with('subcategory', 'category')->orderBy('child_name', 'ASC')->paginate(12);

        return JsonResponser::send(false, $childCategories->count() . ' Childcategor(ies) Available', $childCategories);
    }

     public function getAllChildCategory()
    {

        $childCategories = Children::with('subcategory', 'category')->orderBy('child_name', 'ASC')->get();

        return JsonResponser::send(false, $childCategories->count() . ' Childcategor(ies) Available', $childCategories);
    }

    /**
     * Get child category by sub category Id
     */
    public function getChildCatBySubCatId($subCatId)
    {
        $childCategories = Children::where('sub_cat_id', $subCatId)->orderBy('child_name', 'ASC')->get();

        if(!$childCategories){
            return JsonResponser::send(true, 'Record not found', []);
        }

        return JsonResponser::send(false, $childCategories->count() . ' Childcategor(ies) Available', $childCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validateChildcategory($request);

        if ($validate->fails()) {
            toastr()->error($validate->errors()->all()[0], 'Validation Failed');
            return back();
        }

        try {
            $childCategory = Children::create([
                'cat_id' => $request->cat_id,
                'sub_cat_id' => $request->sub_cat_id,
                'child_name' => $request->child_name,
                'created_by' => auth()->user()->id,
            ]);
            toastr()->success('Children Category Created Successfully!', 'Created!');
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
        $childCategory = Children::where('id', $id)->with('category', 'subcategory', 'product')->with(["creator" => function ($query) {
            $query->select("id", "firstname", "lastname");
        }])->first();

        if (!$childCategory) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        return JsonResponser::send(false, '', $childCategory);
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
        $childCategory = Children::find($id);

        if (!$childCategory) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        $validate = $this->validateChildcategory($request);

        if ($validate->fails()) {
            return JsonResponser::send(true, 'Validation Failed', $validate->errors()->all());
        }

        try {

            $childCategory->update([
                'cat_id' => $request->cat_id,
                'sub_cat_id' => $request->sub_cat_id,
                'child_name' => $request->child_name,
            ]);

            return JsonResponser::send(false, 'Children Category Updated Successfully!', $childCategory);
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
        $childCategory = Children::find($id);

        if (!$childCategory) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        try {

            $childCategory->delete();

            return JsonResponser::send(false, 'Children category deleted successfully', null);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }


    /**
     * Validate Childcategory Request
     */
    public function validateChildcategory(Request $request)
    {
        if ($request->isMethod('put')) {
            $rules = [
                'cat_id' => 'required',
                'sub_cat_id' => 'required',
                'child_name' => 'required|unique:childrens,child_name,' . $request->id,
            ];
        } else {
            $rules = [
                'cat_id' => 'required',
                'sub_cat_id' => 'required',
                'child_name' => 'required|unique:childrens'
            ];
        }

        $validateChildcategory = Validator::make($request->all(), $rules);
        return $validateChildcategory;
    }

    /**
     * Activate Sub Category
     */
    public function activate($id)
    {
        $childcategory = Children::find($id);

        if (!$childcategory) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        try {
            $childcategory->update([
                'is_active' => 1,
            ]);

            return JsonResponser::send(false, 'Children category Activated Successfully!', $childcategory);
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
        $childcategory = Children::find($id);

        if (!$childcategory) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        try {
            $childcategory->update([
                'is_active' => 0,
            ]);

            return JsonResponser::send(false, 'Children category dectivated Successfully!', $childcategory);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }

    /**
     * Search childcategory
     */
    public function searchChildCategory(Request $request)
    {
        try {
            $childcategory = Children::where('child_name', 'LIKE', "%{$request->search}%")->paginate(12);

            return JsonResponser::send(false, '', $childcategory);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }
}
