<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Models\User;
use App\Models\UserCategory;
use Illuminate\Http\Request;

class UserController extends ApiBaseController
{
    public function getUsersByCategory(Request $request,$category_id)
    {
        $perPage = $request->size ? $request->size : 10;

        $user_categories_ids = UserCategory::where('category_id',$category_id)->get('user_id');

        $users = User::whereIn('id',$user_categories_ids)->with('city')->paginate($perPage,['first_name','last_name','description','rating_score','image_path','city_id']);

        return $this->successResponse(['users' => $users]);
    }
}
