<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Models\City;
use Illuminate\Http\Request;


class StaticController extends ApiBaseController
{
    public function getAllCities()
    {
        $cities = City::all();

        return $this->successResponse(['cities' => $cities]);
    }
}
