<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Models\Project;
use Illuminate\Http\Request;
use Auth;
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
}
