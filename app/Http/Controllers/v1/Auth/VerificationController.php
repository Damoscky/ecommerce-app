<?php

namespace App\Http\Controllers\v1\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Responser\JsonResponser;

class VerificationController extends Controller
{
    /**
     * API Verify User email
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyUser($code)
    {
        $check = DB::table('user_verifications')->where('token', $code)->first();

        if (!is_null($check)) {
            $user = User::where("id", $check->user_id)->with("userbilling")->with("usershipping")->first();

            if ($user->is_verified == 1) {
                return JsonResponser::send(true, "Account already verified.", null, 400);
            }

            $user->update(['is_verified' => 1]);

            $token = JWTAuth::fromUser($user);

            $data = [
                'accessToken' => $token,
                'tokenType' => 'Bearer',
                "user" => $user
            ];
            DB::table('user_verifications')->where('user_id', $check->user_id)->delete();

            return JsonResponser::send(false, "Account Verification successful.", $data);
        }

        return JsonResponser::send(true, "Verification code is invalid.", null, 400);
    }
}
