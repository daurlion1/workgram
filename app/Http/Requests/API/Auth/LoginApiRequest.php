<?php

namespace App\Http\Requests\Api\V1\Auth;

use App\Http\Requests\Api\ApiBaseRequest;
use App\Models\User;

class LoginApiRequest extends ApiBaseRequest
{
    public function injectedRules()
    {
        return [

            'email' => ['email', 'string'],
            'password' => ['required', 'string'],
            'device_token' => ['string'],
//            'platform' => ['required', 'string', "in:" . User::PLATFORM_ANDROID . "," . User::PLATFORM_IOS],
        ];
    }

}
