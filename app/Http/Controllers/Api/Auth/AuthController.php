<?php
/**
 * @license Apache 2.0
 */

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\ApiServiceException;
use App\Http\Controllers\ApiBaseController;
use App\Http\Errors\ErrorCode;
use App\Http\Requests\Api\V1\Auth\AuthorizedResetPasswordApiRequest;
use App\Http\Requests\Api\V1\Auth\CheckLoginExistenceApiRequest;
use App\Http\Requests\Api\V1\Auth\LoginApiRequest;
use App\Http\Requests\Api\Auth\RegisterApiRequest;
use App\Http\Requests\Api\V1\Auth\SetDeviceTokenApiRequest;
use App\Http\Utils\ApiUtil;
use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Utils\StaticConstants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;



class AuthController extends ApiBaseController
{




    public function login(LoginApiRequest $request)
    {

        $user = null;
        $user = User::where('email', $request->email)
                ->first();

        if (!$user) {
            throw new ApiServiceException(400, false, [
                'errors' => [
                    'provide with login or password'
                ],
                'errorCode' => ErrorCode::INVALID_LOGIN
            ]);
        }


        if (!$this->checkPassword($request->password, $user->password)) {
            throw new ApiServiceException(400, false, [
                'errors' => [
                    'Invalid login or password'
                ],
                'errorCode' => ErrorCode::INVALID_PASSWORD
            ]);
        }

        $user->current_token = ApiUtil::generateTokenFromUser($user);
        $user->save();

//        dd($request);


        if ($request->device_token) {
            $this->setDeviceToken($user, $request->device_token, $request->platform);
        }
        $mobileUser = (object)array();
        $mobileUser->token = $user->current_token;
        $mobileUser->name = $user->name;
        $mobileUser->surname = $user->surname;
        $mobileUser->nickname = $user->nickname;
        $mobileUser->avatar = $user->image_path;



        return $this->successResponse(['token' => $mobileUser->token, 'name' => $mobileUser->name, 'surname' => $mobileUser->surname,
            'nickname' => $mobileUser->nickname, 'avatar' => $mobileUser->avatar]);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }


    public function logout()
    {
        $user = Auth::user();
        $user->current_token = '';
        $user->device_token = null;
        $user->save();
        auth()->logout();
        return $this->successResponse(['message' => 'Successfully logged out']);
    }


    public function refresh()
    {
        return $this->successResponse(['token' => (auth()->refresh())]);
    }


        public function register(RegisterApiRequest $request)
    {
        $user = null;
        if ($request->has('city_id')) {
            $city = City::find($request->city_id);
            if (!$city) throw new ApiServiceException(404, false, [
                'errors' => [
                    'Город не найден!'
                ],
                'errorCode' => ErrorCode::RESOURCE_NOT_FOUND
            ]);
        }
        $user = new User();
        $user->password = bcrypt($request->password);
        $user->remember_token = '';
        $user->role_id = Role::USER_ID;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->current_token = '';
        $user->nickname = $request->nickname;
        $user->image_path = StaticConstants::DEFAULT_AVATAR;
        $user->city_id = $request->city_id ? $request->city_id : 1;

        $user->description = $request->description;
        $user->device_token = ' ';
        $user->rating_score = 0;

        $user->email = $request->email;
            //VerifyEmail

        $user->save();


        if (!$user) {
            throw new ApiServiceException(400, false, [
                'errors' => [
                    'User not created'
                ],
                'errorCode' => ErrorCode::INVALID_FIELD
            ]);
        }

        $user->current_token = ApiUtil::generateTokenFromUser($user);
        if (!$user->current_token) {
            throw new ApiServiceException(401, false, [
                'errors' => [
                    'Invalid login or password'
                ],
                'errorCode' => ErrorCode::UNAUTHORIZED
            ]);
        }


        $user->save();



        if ($request->device_token) {
            $this->setDeviceToken($user, $request->device_token, $request->platform);
        }
        return $user->current_token;
    }


    public function checkLogin(CheckLoginExistenceApiRequest $request)
    {
        return $this->successResponse(['is_exists' => $this->authService->checkLoginExistence($request)]);
    }

    public function setDeviceToken(SetDeviceTokenApiRequest $request)
    {
        $this->authService->setDeviceToken(Auth::user(), $request->device_token, $request->platform);
        return $this->successResponse(['message' => 'Device token set']);
    }

    public function resetPassword(AuthorizedResetPasswordApiRequest $request)
    {
        $this->authService->authorizedResetPassword(Auth::user(), $request->password, $request->new_password);
        return $this->successResponse(['message' => 'Password updated']);
    }


    public function checkPassword($password, $hashedPassword): bool
    {
        return Hash::check($password, $hashedPassword);
    }
}