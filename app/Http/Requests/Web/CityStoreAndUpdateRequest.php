<?php

namespace App\Http\Requests\Web;

use App\Http\Requests\WebBaseRequest;


class CityStoreAndUpdateRequest extends WebBaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function injectedRules(): array
    {
        return [
            'name' => ['required', 'string'],


        ];
    }
}
