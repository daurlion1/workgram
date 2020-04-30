<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiServiceException;
use App\Http\Controllers\ApiBaseController;
use App\Http\Errors\ErrorCode;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends ApiBaseController
{
    public function getProjectsByCategory(Request $request)
    {
        $perPage = $request->size ? $request->size : 10;
        $projects = Project::where('category_id',$request->category_id)->paginate($perPage);
        return $this->successResponse(['$projects' => $projects]);
    }

    public function getUserProjects(Request $request)
    {
        $user = Auth::user();
        $perPage = $request->size ? $request->size : 10;

        if ($request->type == "creator"){
            $projects = Project::where('creator_id',$user->id)->paginate($perPage);
        }
        elseif($request->type == "implementer") {
            $projects = Project::where('implementer_id',$user->id)->paginate($perPage);
        }
        return $this->successResponse(['$projects' => $projects]);
    }

    public function createProject(Request $request)
    {
        $user = Auth::user();
        $category_id = $request->category_id;
        $сategory = Category::find($category_id);
        if (!$сategory) throw new ApiServiceException(404, false, [
            'errors' => [
                'Такой категории не существует!'
            ],
            'errorCode' => ErrorCode::RESOURCE_NOT_FOUND
        ]);

        $name = $request->name;
        $description = $request->description;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $price = $request->price;
        $start = $request->start;
        $finish = $request->finish;

        DB::beginTransaction();
        try{
        Project::create([
            'category_id' => $category_id,
            'name' => $name,
            'description' => $description,
            'longitude' => $longitude,
            'latitude' =>$latitude,
            'creator_id' => $user->id,
            'price' => $price,
            'status' => Project::CREATED,
            'start' => $start,
            'finish' => $finish
        ]);

            DB::commit();
            return "Успешно создан!";
        } catch(\Exception $exception){

            DB::rollBack();
            throw new ApiServiceException(500, false, ['errors' => [$exception->getMessage()],
                'errorCode' => ErrorCode::SYSTEM_ERROR
            ]);
        }
    }
}