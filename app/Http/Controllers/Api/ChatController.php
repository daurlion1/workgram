<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ChatController extends ApiBaseController
{
    public function getAllChats(Request $request){
        $user = Auth::user();
        $perPage = $request->size ? $request->size : 10;
        $chats = Chat::where('creator_id',$user->id)->with('implementer')->orWhere('implementer_id',$user->id)->with('creator')->paginate($perPage);

        return $this->successResponse(['chats' => $chats]);

    }
}
