<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Models\User;
use App\Utils\StaticConstants;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ProfileController extends ApiBaseController
{
    public function myProfile()
    {
        $user = Auth::user();
        $profile = (object)array();
        $profile->id = $user->id;
        $profile->avatar = $user->image_path;
        $profile->name = $user->first_name ? $user->first_name : '';
        $profile->surname = $user->last_name ? $user->last_name : '';
        $profile->created = $user->created_at;
        $profile->rating_score = $user->rating_score;
        $profile->city = $user->city ? $user->city->name : 'Алматы';
        $profile->nickname = $user->nickname;
        $profile->description = $user->description;

        return $this->successResponse(['profile' => $profile]);
    }

    public function changeAvatar(Request $request)
    {

        $user = Auth::user();
        $path = User::DEFAULT_RESOURCE_DIRECTORY;
        $oldPath = $user->image_path;
        $path = $this->avatarUpdateAndStore($request->avatar, $path, $oldPath);
        $user->image_path = $path;
        $user->save();
        return $this->successResponse(['message' => "Аватар успешно изменен!"]);

    }

    public function avatarUpdateAndStore(UploadedFile $image, string $path, string $oldFilePath = null): string
    {
        if ($oldFilePath && $oldFilePath != StaticConstants::DEFAULT_AVATAR) {
            $this->remove($oldFilePath);
        }
        return $this->store($image, $path);
    }
    public function store(UploadedFile $image, string $path): string
    {
        $image_path = time() . ((string)Str::uuid()) . 'img.' .$image->getClientOriginalExtension();
        $imageFullPath = $image->move($path, $image_path);
        return $imageFullPath;
    }
    public function remove(string $path)
    {
        if ($path != StaticConstants::DEFAULT_IMAGE) {
            if (file_exists($path) && !is_dir($path)) {
                return unlink($path);
            }
        }

        return false;
    }
}
