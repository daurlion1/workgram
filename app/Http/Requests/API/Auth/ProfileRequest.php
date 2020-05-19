<?php


namespace App\Http\Requests\API\Auth;


use App\Http\Requests\ApiBaseRequest;

class ProfileRequest extends ApiBaseRequest
{
    public function injectedRules()
    {
        return [
            'name' => ['string'],
            'surname' => ['string'],
            'nickname' => ['string'],
            'city_id' => ['numeric'],
            'description'=>['string']
        ];
    }
}
