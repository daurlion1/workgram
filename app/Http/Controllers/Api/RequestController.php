<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiServiceException;
use App\Http\Errors\ErrorCode;
use App\Models\Project;
use App\Models\ProjectRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function sendRequest(Request $request)
    {
        $user = Auth::user();
        $is_to_specific_user = $request->is_to_specific_user;
        $project_id = $request->project_id;
        $project = Project::find($project_id);
        if (!$project) throw new ApiServiceException(404, false, [
            'errors' => [
                'Такого проекта не существует!'
            ],
            'errorCode' => ErrorCode::RESOURCE_NOT_FOUND
        ]);

        if($is_to_specific_user == false) {

                ProjectRequest::create([
                    'user_id' => $user->id,
                    'is_to_specific_user' => $is_to_specific_user,
                    'project_id' => $project_id
                ]);
            $message = "Упешно отправлен";
        }
        else{
            ProjectRequest::create([
                'user_id' => $request->implementer_id,
                'is_to_specific_user' => $is_to_specific_user,
                'project_id' => $project_id
            ]);
            $message = "Упешно отправлен";
        }
        return $message;
    }
}
