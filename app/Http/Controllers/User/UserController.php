<?php

namespace App\Http\Controllers\User;

use App\Action\User\UserRegister;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userRegister(
        UserRegister $userRegister,
        UserRegisterRequest $request
    ): JsonResponse {

        $validatedUserRegisterRequest = $request->validated();

        if($validatedUserRegisterRequest){
            return response()->json($userRegister($validatedUserRegisterRequest));
        }

        return response()->json();

    }
}
