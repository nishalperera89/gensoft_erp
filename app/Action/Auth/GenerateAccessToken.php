<?php

namespace App\Action\Auth;

use App\Models\User;

class GenerateAccessToken
{
    public static function execute(User $user): string
    {
        return $user->createToken($user->user_name,['server:demoUser'])->plainTextToken;
    }
}
