<?php

namespace App\Action\Auth;

use App\Models\User;
use App\Service\ResponseGenerator\ResponseGenerator;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    public function __invoke(array $validatedUserRequest): array
    {
        $user = User::where('user_name', $validatedUserRequest['user_name'])->first();

        if(!$user){
            return ResponseGenerator::notFoundResponse('User Not Found');
        }

        return ResponseGenerator::responseWithData(
            'user_details',
            [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'user_name' => $user->user_name,
                'role' => $user->role,
            ]
        );
    }

}
