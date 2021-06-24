<?php

namespace App\Http\Controllers\v1\Auth;

use App\Models\User;
use App\Models\SocialAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use JWTAuth, Validator;

class SocialAuthController extends Controller
{


    /**
     * Social SignUp
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function socialSignUp($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Social SignUp
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleProviderCallback($provider)
    {
        try {

            $user = Socialite::driver($provider)->stateless()->user();

            $data = [
                "email" => $user->getEmail(),
                "firstname" => explode(" ", $user->getName())[0],
                "lastname" => explode(" ", $user->getName())[1],
            ];

            $userSocialAccount = SocialAccount::where('provider_id', $user->id)->where('provider_name', $provider)->first();

            if ($userSocialAccount) {
                $dbuser = User::with("userbilling")->with("usershipping")->find($userSocialAccount->user_id);
                $token = JWTAuth::fromUser($dbuser);

                $response = [
                    'accessToken' => $token,
                    'tokenType' => 'Bearer',
                    "user" => $dbuser
                ];

                return response()->json([
                    'error' => false,
                    'data'  => $response
                ], 200);
            } else {
                $mailExists = User::where('email', $data['email'])->first();

                if ($mailExists) {
                    // return redirect(env('CLIENT_BASE_URL') . '/auth/social-callback?message=Email already taken.');
                    return response()->json([
                        'error' => true,
                        'message' => 'Email already taken.',
                        'data' => null
                    ], 400);
                }
                $dbuser = User::create($data);
                // set user role
                $dbuser->assignRole("customer");

                if ($dbuser) {
                    SocialAccount::create([
                        "provider_id" => $user->getId(),
                        "provider_name" => $provider,
                        "user_id" => $dbuser->id
                    ]);
                }
                $token = JWTAuth::fromUser($dbuser);
                $userData = User::with("userbilling")->with("usershipping")->find($dbuser->id);

                $response = [
                    'accessToken' => $token,
                    'tokenType' => 'Bearer',
                    "user" => $userData
                ];

                return response()->json([
                    'error' => false,
                    'data'  => $response
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => 'Unable to login using ' . $provider . '. Please try again',
                'data' => null
            ]);
        }
    }

    /**
     * Social SignUp
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function socialAuth(Request $request)
    {
        /** 
         * Validate Data
         */
        $validate = $this->validateAuth($request);
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

        try {

            $user = Socialite::driver($request->provider)->userFromToken($request->token);

            $data = [
                "email" => $user->getEmail(),
                "firstname" => explode(" ", $user->getName())[0],
                "lastname" => explode(" ", $user->getName())[1],
                "image" => $user->avatar,
                'is_verified' => 1
            ];

            $userSocialAccount = SocialAccount::where('provider_id', $user->id)->where('provider_name', $request->provider)->first();

            if ($userSocialAccount) {
                $dbuser = User::with("userbilling")->with("usershipping")->find($userSocialAccount->user_id);
                $token = JWTAuth::fromUser($dbuser);

                $response = [
                    'accessToken' => $token,
                    'tokenType' => 'Bearer',
                    "user" => $dbuser
                ];

                return response()->json([
                    'error' => false,
                    'data'  => $response
                ], 200);
            } else {
                $mailExists = User::where('email', $data['email'])->first();

                if ($mailExists) {
                    return response()->json([
                        'error' => true,
                        'message' => 'Email already taken.',
                        'data' => null
                    ], 400);
                }
                $dbuser = User::create($data);
                // set user role
                $dbuser->assignRole("customer");

                if ($dbuser) {
                    SocialAccount::create([
                        "provider_id" => $user->getId(),
                        "provider_name" => $request->provider,
                        "user_id" => $dbuser->id
                    ]);
                }
                $token = JWTAuth::fromUser($dbuser);
                $userData = User::with("userbilling")->with("usershipping")->find($dbuser->id);

                $response = [
                    'accessToken' => $token,
                    'tokenType' => 'Bearer',
                    "user" => $userData
                ];

                return response()->json([
                    'error' => false,
                    'data'  => $response
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => 'Unable to login using ' . $request->provider . '. Please try again',
                'data' => null
            ]);
        }
    }

    /**
     * Validate Cart Request
     */
    public function validateAuth(Request $request)
    {
        $rules = [
            'provider' => 'required|in:facebook,google',
            'token' => 'required'
        ];
        return Validator::make($request->all(), $rules);
    }
}
