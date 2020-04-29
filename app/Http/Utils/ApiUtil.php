<?php


namespace App\Http\Utils;


use Carbon\Carbon;
use Illuminate\Support\Str;
use JWTAuth;

class ApiUtil
{


    public static function generateToken(): string
    {
        return Str::random(42);
    }

    public static function generateTokenFromUser($user): string
    {
//        if ($user->current_token) {
//            $auth = JWTAuth::setToken($user->current_token);
//            $auth->invalidate();
//        }
        $expiration_date = Carbon::now()->addDays(7)->timestamp;
        $customClaims = ['exp' => $expiration_date];
        return JWTAuth::fromUser($user, $customClaims);
    }

}
