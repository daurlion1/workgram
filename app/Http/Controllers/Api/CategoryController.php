<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Models\Category;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use Auth;
use phpDocumentor\Reflection\Types\Array_;

class CategoryController extends ApiBaseController
{
    public function getCategories(Request $request) {
        $perPage = $request->size ? $request->size : 10;
        $categories = Category::paginate($perPage);
        return $this->successResponse(['categories' => $categories]);
    }

    public function getAllCategories(Request $request) {

        $categories = Category::all();
        return $this->successResponse(['categories' => $categories]);
    }

    public function getUserCategories(Request $request) {
        $perPage = $request->size ? $request->size : 10;
        $user = Auth::user();
        $user_categories_ids = array();
        $user_categories = UserCategory::where('user_id', $user->id)->get();

        foreach ($user_categories as $user_category){
            array_push($user_categories_ids, $user_category->category_id);

        }

        $categories = Category::paginate($perPage);

        foreach ($categories as $category){

                if ( in_array($category->id,$user_categories_ids) ){
                    $category->have = true;
                }
                else{
                    $category->have = false;
                }


        }
        return $this->successResponse(['categories' => $categories] );
    }
    public function chooseOrRemoveCategory(Request $request)
    {

        $user = Auth::user();
        $user_categories = UserCategory::where('user_id', $user->id)->get();
        $old_ids = array();
        foreach ($user_categories as $category) {

            array_push($old_ids, $category->category_id);
        }
        $ids = $request->categories_ids;
        foreach ($ids as $id) {
            if(in_array($id,$old_ids) == false)
            {
                $user_category = UserCategory::create([
                    'user_id' => $user->id,
                    'category_id' => $id,
                ]);

                $user_category->save();
            }

        }

        foreach ($old_ids as $id) {
            if(in_array($id,$ids) == false)
            {
                $old_user_category = UserCategory::where('user_id',$user->id)->where('category_id',$id);
                $old_user_category->delete();

            }

    }

        return $this->successResponse(['message' => 'Successful operation']);


    }
}
