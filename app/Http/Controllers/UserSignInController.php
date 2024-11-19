<?php

namespace App\Http\Controllers;

use App\Action\Auth\CheckUser;
use App\Http\Requests\UserSignInRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserSignInController extends Controller
{
    public function checkUserAuthentication(
        UserSignInRequest $request,
        CheckUser $checkUser
    ): JsonResponse
    {
        $validatedUserRequest = $request->validated();

        return response()->json($checkUser($validatedUserRequest));

    }
}
