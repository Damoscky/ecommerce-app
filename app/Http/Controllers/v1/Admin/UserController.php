<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Responser\JsonResponser;
use Carbon\Carbon;

class UserController extends Controller
{


    public function index()
    {
        $role = 'customer';
        $customers = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', '=', $role);
        })->paginate(12);

        return JsonResponser::send(false, 'All customers', $customers);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with('userbilling')->with('usershipping')->with('order')->first();

        if (!$user) {
            return JsonResponser::send(true, 'User not found', null, 404);
        }

        return JsonResponser::send(false, '', $user);
    }

    /**
     * Activate user
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return JsonResponser::send(true, 'User not found', null, 404);
        }

        $user->forceDelete();

        return JsonResponser::send(false, 'User deleted successfully', null);
    }

    /**
     * Activate user
     */
    public function activate($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return JsonResponser::send(true, 'User not found', null, 404);
            }

            /** if user is found */

            $user->update([
                'is_active' => 1,
            ]);

            return JsonResponser::send(false, 'User Activated Successfully!', $user, 200);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }


    /**
     * Deactivate User
     */
    public function deactivate($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return JsonResponser::send(true, 'User not found', null, 404);
            }

            $user->update([
                'is_active' => 0,
            ]);

            return JsonResponser::send(false, 'User deactivated Successfully!', $user, 200);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }




    public function customerStat()
    {
        try {
            $role = 'customer';
            $activatedCustomers = User::whereHas('roles', function ($roleTable) use ($role) {
                $roleTable->where('name', '=', $role);
            })->where('is_active', true)->count();

            $deactivatedCustomers = User::whereHas('roles', function ($roleTable) use ($role) {
                $roleTable->where('name', '=', $role);
            })->where('is_active', false)->count();

            $customers = User::whereHas('roles', function ($roleTable) use ($role) {
                $roleTable->where('name', '=', $role);
            })->count();

            $response = [
                'totalCustomers' => $customers,
                'activatedCustomers' => $activatedCustomers,
                'deactivatedCustomers' => $deactivatedCustomers
            ];

            return JsonResponser::send(false, 'User deactivated Successfully!', $response, 200);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }

    /**
     * Search Customer
     */
    public function searchCustomer(Request $request)
    {
        try {
            $userRole = 'customer';

            $customer = User::whereHas('roles', function ($roleTable) use ($userRole) {
                $roleTable->where('name', $userRole);
            })->where(function ($query) use ($request) {
                $query->where('firstname', 'LIKE', "%{$request->search}%")
                    ->orWhere('lastname', 'LIKE', "%{$request->search}%")
                    ->orWhere('email', 'LIKE', "%{$request->search}%");
            })->paginate(12);

            return JsonResponser::send(false, '', $customer, 200);
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, 'Internal server error', null, 500);
        }
    }

    public function recentCustomers()
    {
        $twoWeeks = Carbon::today()->subDay(14)->format('Y-m-d');
        $roleName = 'user';
        $data = User::whereHas('roles', function ($q) use ($roleName) {
            $q->where('name', '=', $roleName);
        })->whereDate('created_at', '<', $twoWeeks)->paginate(12);

        return JsonResponser::send(false, '', $data, 200);
    }
}
