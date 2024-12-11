<?php

use App\Http\Middleware\DemoUserCheckMiddleware;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UserSignInController;
use Illuminate\Support\Facades\Route;

Route::post('/user-sign-in',[usersigninController::class, 'checkUserAuthentication']);

Route::middleware(['auth:sanctum', DemoUserCheckMiddleware::class])->group(function () {
    Route::post('/user-register',[UserController::class, 'userRegister']);
});


