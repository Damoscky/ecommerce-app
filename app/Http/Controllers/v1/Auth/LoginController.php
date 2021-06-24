<?php

namespace App\Http\Controllers\v1\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Responser\JsonResponser;

class LoginController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        /**
         * Validate Data
         */
        $validate = $this->validateLogin($request);
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            toastr()->error('Email or Password is empty. Please try again', 'Validation Failed!');
            return back();
        }

        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            toastr()->error('Incorrect Email or Password. Please try again');
            return back();
        }
        // Check if email have been verified
        if (!auth()->user()->is_verified) {
            toastr()->error('Account not verified! Kindly verify your email.', 'Verify Account');
            return back();
        }

        // Check if user has been deactivated
        if (!auth()->user()->is_active) {
            toastr()->error('Your account has been deactivated. Please contact the administrator');
            return back();
        }
        $user = User::with('userbilling','usershipping')->find(auth()->user()->id);

        if($user->roles[0]->name == "admin"){
            toastr()->success('You are logged in successfully', 'Welcome!');
            return redirect()->route('admin.dashboard');
        }elseif($user->roles[0]->name == "merchant"){
            toastr()->success('You are logged in successfully', 'Welcome!');
            return redirect()->route('vendor.dashboard');
        }else{
            toastr()->success('You are logged in successfully', 'Welcome!');
            return redirect()->route('pages.index');
        }


    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        toastr()->success('You are logged out successfully', 'Successfully logged out!');
        return redirect()->route('pages.index');
    }

    /**
     * Validate resend code request
     */
    protected function validateLogin($request)
    {
        $rules =  [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ];

        $validatedData = Validator::make($request->all(), $rules);
        return $validatedData;
    }
}
