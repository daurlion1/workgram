<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\ApiBaseRequest;

class AuthorizedResetPasswordApiRequest extends ApiBaseRequest
{
    public function injectedRules()
    {
        return [
            'password' => ['string', 'min:8', 'required'],
            'new_password' => ['string', 'required', 'min:8']
        ];
    }

}
