<?php

namespace App\Http\Controllers\v1\Auth;

use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Responser\JsonResponser;

class RegisterController extends Controller
{
    /**
     * Customer Sign up
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        /**
         * Validate Data
         */
        $validate = $this->validateRegister($request);
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            toastr()->error('One or more field is/are empty. Please try again', 'Validation Failed!');
            return back();
        }

        $data = $request->only('firstname', 'lastname', 'phoneno', 'email', 'password');
        $data["password"] =  Hash::make($request->password);

        try {
            DB::beginTransaction();

            $user = User::create($data);

            $user->assignRole("customer");

            $verification_code = Str::random(30); //Generate verification code
            DB::table('user_verifications')->insert(['user_id' => $user->id, 'token' => $verification_code]);

            $maildata = [
                'email' => $data['email'],
                'name' => $data["firstname"],
                'verification_code' => $verification_code,
                'subject' => "Please verify your email address.",
                "vendor" => false
            ];

            // Mail::to($data['email'])->send(new VerifyEmail($maildata));
            DB::commit();
            toastr()->success('Thanks for signing up! Please check your email to complete your registration', 'Registration Successful!');
            return back();

        } catch (\Throwable $error) {
            DB::rollback();
            logger($error);
            return $error->getMessage();
            toastr()->error('Internal server error', 'Internal Server Error!');
            return back();
        }
    }

    /**
     * Vendor Sign up
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function vendorRegister(Request $request)
    {
        /**
         * Validate Data
         */
        $validate = $this->validateVendorRegister($request);
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            return JsonResponser::send(true, "Validation Failed", $validate->errors()->all());
        }

        $userData = $request->only(
            'firstname',
            'lastname',
            'phoneno',
            'email',
            'password',
            "address",
            "zip_code",
            "city",
            "state",
            "country"
        );
        $companyData = $request->only("store_name", "store_description", "total_revenue", "total_employees");
        $userData["password"] =  Hash::make($request->password);
        $companyData["name"] = $companyData["store_name"];
        $companyData["description"] = $companyData["store_description"];
        unset($companyData["store_name"]);
        unset($companyData["store_description"]);

        try {
            // process profile picture/company logo
            if ($request->hasFile("image")) {
                $uniqueId = bin2hex(openssl_random_pseudo_bytes(9));
                $name = $uniqueId . '_' . date("YmdHis");
                $userData["image"] = $request->file("image")->storeOnCloudinaryAs("profile", $name)->getSecurePath();
            }

            // process company id cards
            if ($request->hasFile("identification_id")) {
                $uniqueId = bin2hex(openssl_random_pseudo_bytes(9));
                $name = $uniqueId . '_' . date("YmdHis");
                $companyData["identification_id"] = $request->file("identification_id")->storeOnCloudinaryAs("document", $name)->getSecurePath();
            }

            // process company id utility bills
            if ($request->hasFile("utility_bill")) {
                $uniqueId = bin2hex(openssl_random_pseudo_bytes(9));
                $name = $uniqueId . '_' . date("YmdHis");
                $companyData["utility_bill"] = $request->file("utility_bill")->storeOnCloudinaryAs("document", $name)->getSecurePath();
            }

            $user = User::create($userData);

            if ($user) {
                $user->company()->create($companyData);
            }

            $user->assignRole("merchant");


            $verification_code = Str::random(30); //Generate verification code
            DB::table('user_verifications')->insert(['user_id' => $user->id, 'token' => $verification_code]);

            $maildata = [
                'email' => $userData['email'],
                'name' => $userData["firstname"],
                'verification_code' => $verification_code,
                'subject' => "Please verify your email address.",
                "vendor" => true
            ];

            Mail::to($userData['email'])->send(new VerifyEmail($maildata));
            return JsonResponser::send(false, "Thanks for signing up! Please check your email to complete your registration.", null, 201);
        } catch (\Throwable $error) {
            logger($error);
            return $error->getMessage();
            return JsonResponser::send(true, "Internal server error.", null, 500);
        }
    }

    /**
     * Resend Email Token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resendCode(Request $request)
    {
        /**
         * Validate Data
         */
        $validate = $this->validateResendCode($request);
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            return JsonResponser::send(true, "Validation Failed", $validate->errors()->all());
        }

        $email = $request->email;
        $user = User::where("email", $email)->first();
        if (!$user) {
            return JsonResponser::send(true, "User not found", null, 404);
        }

        if ($user->is_verified) {
            return JsonResponser::send(true, "Account already verified", null, 400);
        }

        $verification_code = Str::random(30); //Generate verification code
        DB::table('user_verifications')->insert(['user_id' => $user->id, 'token' => $verification_code]);

        $maildata = [
            'email' => $email,
            'name' => $user->firstname,
            'verification_code' => $verification_code,
            'subject' => "Please verify your email address.",
            "vendor" => $user->hasRole("merchant")
        ];

        Mail::to($email)->send(new VerifyEmail($maildata));
        return JsonResponser::send(false, "Verification link sent successfully.", null);
    }

    /**
     * Validate register request
     */
    protected function validateRegister($request)
    {
        $rules =  [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phoneno' => 'required|max:12|unique:users',
            'password' => 'required|min:6',
            'confirmPassword' => 'same:password'
        ];

        $validatedData = Validator::make($request->all(), $rules);
        return $validatedData;
    }

    /**
     * Validate register request
     */
    protected function validateVendorRegister($request)
    {
        $rules =  [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phoneno' => 'required|max:12|unique:users',
            'password' => 'required|min:6',
            'confirmPassword' => 'same:password',
            'address' => 'required|string|max:255',
            'zip_code' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'store_name' => 'required|string|max:100',
            'store_description' => 'string|max:100',
            'total_revenue' => 'numeric',
            'total_employees' => 'string',
            "image" => "required|image|mimes:jpeg,jpg,png,JPEG,JPG,PNG|max:2048",
            "identification_id" => "required|image|mimes:jpeg,jpg,png,JPEG,JPG,PNG,pdf,PDF|max:2048",
            "utility_bill" => "required|image|mimes:jpeg,jpg,png,JPEG,JPG,PNG,pdf,PDF|max:2048",
        ];

        $validatedData = Validator::make($request->all(), $rules);
        return $validatedData;
    }

    /**
     * Validate resend code request
     */
    protected function validateResendCode($request)
    {
        $rules =  [
            'email' => 'required|email|max:255',
        ];

        $validatedData = Validator::make($request->all(), $rules);
        return $validatedData;
    }
}
