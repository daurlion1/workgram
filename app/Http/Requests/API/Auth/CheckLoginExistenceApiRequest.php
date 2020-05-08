<?php

namespace App\Http\Requests\API\Auth;

use App\Http\Requests\ApiBaseRequest;

class CheckLoginExistenceApiRequest extends ApiBaseRequest
{
    public function injectedRules()
    {
        if (request()->has('email')) {
            return [
                'email' => ['email', 'string']
            ];
        } else {
            return [
                'phone' => ['string']
            ];
        }
    }

}
