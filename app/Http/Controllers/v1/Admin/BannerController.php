<?php

namespace App\Http\Controllers\v1\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Responser\JsonResponser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('created_at', 'DESC')->get();

        return JsonResponser::send(false, $banners->count() . ' Banner(s) Available', $banners);
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
        $banner = Banner::find($id);

        if (!$banner) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        $validate = $this->validateBanner($request);

        if ($validate->fails()) {
            return JsonResponser::send(true, 'Validation Failed', $validate->errors()->all());
        }

        try {
            if ($file = $request->file('image')) {
                $name = $file->getClientOriginalName();
                $imageName = config('app.url') . '/Banner/' . 'reissedwardsecommerceapp_' . date("Y-m-d") . '_' . time() . $name;
                $file->move(('Banner/'), $imageName);
            }
            $banner->update([
                'image' => $imageName,
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->description,
                'created_by' => auth()->user()->id,
            ]);

            return JsonResponser::send(false, 'Banner Updated Successfully!', $banner);
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
        $banner = Banner::where('id', $id)->with(["creator" => function ($query) {
            $query->select("id", "firstname", "lastname");
        }])->first();

        if (!$banner) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        return JsonResponser::send(false, '', $banner);
    }

    /**
     * Validate Banner Request
     */
    public function validateBanner(Request $request)
    {
        if ($request->isMethod('put')) {
            $rules = [
                'image' => 'required',
                'slug' => 'required|unique:banners,slug,' . $request->id,
            ];
        } else {
            $rules = [
                'image' => 'required',
                'slug' => 'required|unique:banners'
            ];
        }

        $validateBanner = Validator::make($request->all(), $rules);
        return $validateBanner;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return JsonResponser::send(true, 'Record Not Found', null, 404);
        }

        try {

            $banners->delete();

            return JsonResponser::send(false, 'Banner deleted successfully', null);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }
}
