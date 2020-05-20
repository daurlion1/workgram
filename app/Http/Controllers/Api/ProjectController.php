<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiServiceException;
use App\Http\Controllers\ApiBaseController;
use App\Http\Errors\ErrorCode;
use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends ApiBaseController
{
    public function getProjectsByCategory(Request $request)
    {
        $user = Auth::user();
        $perPage = $request->size ? $request->size : 10;
        if ($request->has('category_id')){
            $projects = Project::where('category_id',$request->category_id)->with('creator','implementer','category')->paginate($perPage);

        }
        else{
            $projects = Project::with('creator','implementer','category')->paginate($perPage);
        }
        return $this->successResponse(['projects' => $projects]);
    }

    public function getCreatorProjects(Request $request)
    {
        $user = Auth::user();
        $perPage = $request->size ? $request->size : 10;
        $projects = Project::where('creator_id',$user->id)->with('creator','implementer','category')->paginate($perPage);

        return $this->successResponse(['projects' => $projects]);
    }

    public function getImplementerProjects(Request $request)
    {
        $user = Auth::user();
        $perPage = $request->size ? $request->size : 10;
        $projects = Project::where('implementer_id',$user->id)->with('creator','implementer','category')->paginate($perPage);
        return $this->successResponse(['projects' => $projects]);
    }

    public function evaluateProject(Request $request){
        $user = Auth::user();

        $project_id = $request->project_id;
        $score = $request->score;

        $project = Project::find($project_id);
        if (!$project) throw new ApiServiceException(404, false, [
            'errors' => [
                'Проект не найден!'
            ],
            'errorCode' => ErrorCode::RESOURCE_NOT_FOUND
        ]);

        if($project->creator_id == $user->id){

            $project->score = $score;
            $project->status = 2;
            $project->save();

            $implementorProjects = Project::where('implementer_id',$project->implementer_id);
            $implementorScore = $implementorProjects->get()->sum('score') / $implementorProjects->count();
            $implementor = User::find($project->implementer_id);
            $implementor->rating_score = $implementorScore;
            $implementor->save();
        }
        else{
            throw new ApiServiceException(403, false, [
                'errors' => [
                    'Проект вам не принаджедит!'
                ],
                'errorCode' => ErrorCode::RESOURCE_NOT_FOUND
            ]);
        }

        return $this->successResponse(['message' => "Проект оценен успешно"]);
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
            return $this->successResponse(['message' => "Проект успешно создан"]);
        } catch(\Exception $exception){

            DB::rollBack();
            throw new ApiServiceException(500, false, ['errors' => [$exception->getMessage()],
                'errorCode' => ErrorCode::SYSTEM_ERROR
            ]);
        }
    }
}
