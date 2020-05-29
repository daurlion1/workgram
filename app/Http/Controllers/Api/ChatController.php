<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiServiceException;
use App\Http\Controllers\ApiBaseController;
use App\Http\Errors\ErrorCode;
use App\Models\Category;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends ApiBaseController
{
    public function getAllChats(Request $request){
        $user = Auth::user();
        $perPage = $request->size ? $request->size : 10;
        $chats = Chat::where('creator_id',$user->id)
                                                    ->has('messages')
                                                    ->orWhere('implementer_id',$user->id)
                                                    ->has('messages')
                                                    ->orderBy('updated_at', 'desc')
                                                    ->paginate($perPage);




        foreach ($chats as $chat){
            $last_message_id = Message::where('chat_id',$chat->id)->max('id');
            if($user->id == $chat->implementer_id){
                $chat->companion = User::where('id',$chat->creator_id)->first();

            }
            else{
                $chat->companion = User::where('id',$chat->implementer_id)->first();
            }


            if($last_message_id != null){
                $last_message = Message::find($last_message_id);
                if($last_message->text != null){
                    $chat->last_message = $last_message->text;
                }

                $chat->message_time = strval($last_message->created_at);

                if($last_message->author_id == $user->id){
                    $chat->my_message=true;
                }
                else{
                    $chat->my_message=false;
                }
            }



         }

        return $this->successResponse(['chats' => $chats]);

    }

    public function sendMessage(Request $request){
        $user = Auth::user();

        $chat_id = $request->chat_id;

        $chat = Chat::find($chat_id);
        if (!$chat) throw new ApiServiceException(404, false, [
            'errors' => [
                'Такого чата не существует!'
            ],
            'errorCode' => ErrorCode::RESOURCE_NOT_FOUND
        ]);

        if($chat->creator_id == $user->id or $chat->implementer_id == $user->id ){

            DB::beginTransaction();
            try{
                $message = Message::create([
                    'chat_id' => $chat_id,
                    'text' => $request->text,
                    'author_id' => $user->id,

                ]);
                $chat->updated_at = $message->created_at;
                $chat->save();

                DB::commit();
                return $this->successResponse(['message' => "Сообщение успешно отправленно"]);
            } catch(\Exception $exception){

                DB::rollBack();
                throw new ApiServiceException(500, false, ['errors' => [$exception->getMessage()],
                    'errorCode' => ErrorCode::SYSTEM_ERROR
                ]);
            }

        }else{
            throw new ApiServiceException(403, false, [
                'errors' => [
                    'Вы не являетесь участником чата!'
                ],
                'errorCode' => ErrorCode::NOT_ALLOWED
            ]);
        }



    }

    public function getChatMessages(Request $request,$chat_id){
        $perPage = $request->size ? $request->size : 10;
        $user = Auth::user();

        $chat = Chat::find($chat_id);
        if (!$chat) throw new ApiServiceException(404, false, [
            'errors' => [
                'Такого чата не существует!'
            ],
            'errorCode' => ErrorCode::RESOURCE_NOT_FOUND
        ]);

        if($chat->creator_id == $user->id or $chat->implementer_id == $user->id ){

            $messages = Message::where('chat_id',$chat_id)->with('author')->paginate($perPage);
            foreach ($messages as $message){

                if($message->author_id == $user->id){
                    $message->my_message=true;
                }
                else{
                    $message->my_message=false;
                }
            }

            return $this->successResponse(['messages' => $messages]);


        }else{
            throw new ApiServiceException(403, false, [
                'errors' => [
                    'Вы не являетесь участником чата!'
                ],
                'errorCode' => ErrorCode::NOT_ALLOWED
            ]);
        }
    }

    public function createChat($implementer_id){
        $user = Auth::user();

        $creator_id = $user->id;
        $creator = User::find($creator_id);
        $implementer = User::find($implementer_id);

        if (!$creator or !$implementer) throw new ApiServiceException(404, false, [
            'errors' => [
                'Такого пользователя не существует!'
            ],
            'errorCode' => ErrorCode::RESOURCE_NOT_FOUND
        ]);

        if ($creator_id == $implementer_id) throw new ApiServiceException(403, false, [
            'errors' => [
                'Вы не можете начать чат с собой!'
            ],
            'errorCode' => ErrorCode::NOT_ALLOWED
        ]);
        $chat = Chat::where('creator_id',$creator_id)
                    ->where('implementer_id',$implementer_id)
                    ->orWhere('creator_id',$implementer_id)
                    ->where('implementer_id',$creator_id)
                    ->first();


        if($chat!= null){
            if($user->id == $chat->implementer_id){
                $chat->companion = User::where('id',$chat->creator_id)->first();

            }
            else{
                $chat->companion = User::where('id',$chat->implementer_id)->first();
            }
            return $this->successResponse(['data' => $chat]);
        }
        else{
            DB::beginTransaction();
            try{
                $new_chat =  Chat::create([
                    'creator_id' => $creator_id,
                    'implementer_id' => $implementer_id,


                ]);

                if($user->id == $new_chat->implementer_id){
                    $new_chat->companion = User::where('id',$new_chat->creator_id)->first();

                }
                else{
                    $new_chat->companion = User::where('id',$new_chat->implementer_id)->first();
                }

                DB::commit();
                return $this->successResponse(['data' => $new_chat]);
            } catch(\Exception $exception){

                DB::rollBack();
                throw new ApiServiceException(500, false, ['errors' => [$exception->getMessage()],
                    'errorCode' => ErrorCode::SYSTEM_ERROR
                ]);
            }
        }




    }
}
