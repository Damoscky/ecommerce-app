<?php

namespace App\Http\Controllers\v1\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Responser\JsonResponser;
use DB;

class VendorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = 'merchant';

        $vendors = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', $role);
        })->paginate(12);

        return JsonResponser::send(false, 'All vendors', $vendors);
    }

    public function vendorStat()
    {
        $role = 'merchant';
        $activatedVendors = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', $role);
        })->where('is_active', true)->count();

        $deactivatedVendors = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', $role);
        })->where('is_active', false)->count();

        $vendors = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', $role);
        })->paginate(12);

        $response = [
            // 'totalVendors' => count($vendors),
            'activatedVendors' => $activatedVendors,
            'deactivatedVendors' => $deactivatedVendors,
            'vendors' => $vendors
        ];

        return JsonResponser::send(false, '', $response);
    }


    /**
     * Search Vendors
     */
    public function searchVendor(Request $request)
    {
        try {
            $userRole = 'merchant';

            $vendors = User::where(function ($query) use ($request) {
                $query->where('firstname', 'LIKE', "%{$request->search}%")
                    ->orWhere('lastname', 'LIKE', "%{$request->search}%");
            })->whereHas('roles', function ($roleTable) use ($userRole) {
                $roleTable->where('name', $userRole);
            })->orwhereHas('company', function ($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request->search}%");
            })->paginate(12);


            return JsonResponser::send(false, 'All vendors', $vendors);
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

        $user = User::where('id', $id)->first();

        if (!$user) {
            return JsonResponser::send(true, 'Vendor not found', null);
        }

        return JsonResponser::send(false, 'All vendors', $user);
    }

    /**
     * Activate Vendor
     */

    public function activate($id)
    {
        $vendor = User::find($id);

        if (!$vendor) {
            return JsonResponser::send(true, 'User not found', null);
        }

        try {

            $vendor->update([
                'is_active' => 1,
            ]);

            return JsonResponser::send(false, 'User Activated Successfully!', $vendor);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal Server error', [], 500);
        }
    }

    /**
     * Deactivate Vendor
     */
    public function deactivate($id)
    {
        $vendor = User::find($id);
        if (!$vendor) {
            return JsonResponser::send(true, 'User not found', null);
        }

        try {
            $vendor->update([
                'is_active' => 0,
            ]);

            return JsonResponser::send(false, 'User Deactivated Successfully!', $vendor);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal Server error', [], 500);
        }
    }
}
