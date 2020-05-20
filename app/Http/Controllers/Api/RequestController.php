<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiServiceException;
use App\Http\Controllers\ApiBaseController;
use App\Http\Errors\ErrorCode;
use App\Models\Project;
use App\Models\ProjectRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;

class RequestController extends ApiBaseController
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
        return $this->successResponse(['message' => $message]);

    }

    public function acceptRequest(Request $request)
    {
        $user = Auth::user();
        $project_request_id = $request->request_id;
        $project_request = ProjectRequest::where('id',$project_request_id)->first();

        if (!$project_request) throw new ApiServiceException(404, false, [
            'errors' => [
                'Такого запроса не существует!'
            ],
            'errorCode' => ErrorCode::RESOURCE_NOT_FOUND
        ]);
        $is_accepted = $request->is_accepted;
        $project = Project::find($project_request->project_id);

        if($project_request->is_to_specific_user == false and $user->id == $project->creator_id) {

            $project_request->update([
                'is_accepted' => $is_accepted,
            ]);

            if($is_accepted == true){

                $project = Project::find($project_request->project_id);
                $project->update([
                    'implementer_id' => $project_request->user_id,
                ]);
            }

        }
        elseif ($project_request->is_to_specific_user == true and $user->id == $project_request->user_id){

            $project_request->update([
                'is_accepted' => $is_accepted,
            ]);

            if($is_accepted == true){

                $project = Project::find($project_request->project_id);
                $project->update([
                    'implementer_id' => $user->id,
                ]);
            }
            else{
                throw new ApiServiceException(403, false, [
                    'errors' => [
                        'Проект вам не принаджедит!'
                    ],
                    'errorCode' => ErrorCode::RESOURCE_NOT_FOUND
                ]);
            }

        }
        return $this->successResponse(['message' => "Статус успешно изменен"]);


    }

    public function getRequestByProject($project_id){
        $user = Auth::user();

        $project = Project::find($project_id);
        if (!$project) throw new ApiServiceException(404, false, [
            'errors' => [
                'Такого проекта не существует!'
            ],
            'errorCode' => ErrorCode::RESOURCE_NOT_FOUND
        ]);

        if($project->creator_id == $user->id){
            $requests = ProjectRequest::where('project_id',$project_id)
                ->where('is_to_specific_user',false)
                ->with('user')
                ->get();
        }
        else{
            throw new ApiServiceException(403, false, [
                'errors' => [
                    'Проект вам не принаджедит!'
                ],
                'errorCode' => ErrorCode::RESOURCE_NOT_FOUND
            ]);
        }

        return $this->successResponse(['requests' => $requests]);




    }
}
