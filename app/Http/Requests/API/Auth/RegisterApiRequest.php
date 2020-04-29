<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\ApiBaseRequest;

class RegisterApiRequest extends ApiBaseRequest
{
    public function injectedRules()
    {

            return [
                'email' => ['email', 'string', 'unique:users', 'required'],
                'password' => ['string', 'min:3'],
//                'nickname' => ['string'],
//                'firstname'=> ['string'],
//                'lastname' =>['string'],
//                'description' => ['string'],
//                'avatar' => ['image']
            ];

    }

}
