<?php

namespace App\Http\Controllers\v1\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserShipping;
use App\Models\UserBilling;
use Validator;

class ProfileController extends Controller
{

    /**
     * Get Customer Profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user =  User::with("userbilling")->with("usershipping")->find(auth()->user()->id);
        return response()->json([
            'error' => false,
            "message" => "",
            "data" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        /**
         * Validate Data
         */
        $validate = $this->validateProfile($request);
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validate->errors()->all(),
                'data' => null
            ]);
        }
        $imageName = [];
        if ($request->hasFile("image")) {
            $uniqueId = bin2hex(openssl_random_pseudo_bytes(9));
            $name = $uniqueId . '_' . date("YmdHis");
            $imageName = $request->file("image")->storeOnCloudinaryAs("profile", $name)->getSecurePath();
            $userData["image"] = $imageName;
        }
        $user = User::with("userbilling")->with("usershipping")->find(auth()->user()->id);

        !empty($request->firstname) && $userData["firstname"] = $request->firstname;
        !empty($request->lastname) && $userData["lastname"] = $request->lastname;
        !empty($request->phoneno) && $userData["phoneno"] = $request->phoneno;

        !empty($userData) && $user->update($userData);
        try {
            // create/update user billing address
            UserBilling::updateOrCreate(["user_id" => $user->id], [
                "address1" => $request->billing_address1 ?? $user->userbilling->address1 ?? null,
                "country1" => $request->billing_country1 ?? $user->userbilling->country1 ?? null,
                "city1" => $request->billing_city1 ?? $user->userbilling->city1 ?? null,
                "state1" => $request->billing_state1 ?? $user->userbilling->state1 ?? null,
                "postal_code1" => $request->billing_postal_code1 ?? $user->userbilling->postal_code1 ?? null,
                "address2" => $request->billing_address2 ?? $user->userbilling->address2 ?? null,
                "country2" => $request->billing_country2 ?? $user->userbilling->country2 ?? null,
                "city2" => $request->billing_city2 ?? $user->userbilling->city2 ?? null,
                "state2" => $request->billing_state2 ?? $user->userbilling->state2 ?? null,
                "postal_code2" => $request->billing_postal_code2 ?? $user->userbilling->postal_code2 ?? null,
            ]);
            // create/update user shipping address
            UserShipping::updateOrCreate(["user_id" => $user->id], [
                "address1" => $request->shipping_address1 ?? $user->usershipping->address1 ?? null,
                "country1" => $request->shipping_country1 ?? $user->usershipping->country1 ?? null,
                "city1" => $request->shipping_city1 ?? $user->usershipping->city1 ?? null,
                "state1" => $request->shipping_state1 ?? $user->usershipping->state1 ?? null,
                "postal_code1" => $request->shipping_postal_code1 ?? $user->usershipping->postal_code1 ?? null,
                "address2" => $request->shipping_address2 ?? $user->usershipping->address2 ?? null,
                "country2" => $request->shipping_country2 ?? $user->usershipping->country2 ?? null,
                "city2" => $request->shipping_city2 ?? $user->usershipping->city2 ?? null,
                "state2" => $request->shipping_state2 ?? $user->usershipping->state2 ?? null,
                "postal_code2" => $request->shipping_postal_code2 ?? $user->usershipping->postal_code2 ?? null
            ]);

            $user = $user->refresh();

            return response()->json([
                "error" => false,
                "message" => "Profile Updated successfully",
                "data" => $user
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => "Internal server error.",
                'data' => null
            ], 500);
        }
    }

    /**
     * Validate profile request
     */
    protected function validateProfile($request)
    {
        $rules = [
            'firstname' => 'string|max:255',
            'lastname' => 'string|max:255',
            'phoneno' => 'max:12|unique:users,phoneno,' . auth()->user()->id,
            "image" => "image|mimes:jpeg,jpg,png,gif,JPEG,JPG,PNG,GIF|max:2048",
            'billing_address1' => 'required|string|min:10',
            'billing_state1' => 'required|string|max:150',
            'billing_city1' => 'required|string|max:150',
            'billing_country1' => 'string|max:150',
            'billing_postal_code1' => 'string|max:150',
            'billing_address2' => 'string|min:10|nullable',
            'billing_state2' => 'string|max:150|nullable',
            'billing_city2' => 'string|max:150|nullable',
            'billing_country2' => 'string|max:150|nullable',
            'billing_postal_code2' => 'string|max:150|nullable',

            'shipping_address1' => 'required|string|min:10',
            'shipping_state1' => 'required|string|max:150',
            'shipping_city1' => 'required|string|max:150',
            'shipping_country1' => 'string|max:150',
            'shipping_postal_code1' => 'string|max:150',
            'shipping_address2' => 'string|min:10|nullable',
            'shipping_state2' => 'string|max:150|nullable',
            'shipping_city2' => 'string|max:150|nullable',
            'shipping_country2' => 'string|max:150|nullable',
            'shipping_postal_code2' => 'string|max:150|nullable',
        ];


        $validatedData = Validator::make($request->all(), $rules);
        return $validatedData;
    }
}
