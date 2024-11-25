<?php

namespace App\Action\Auth;

use App\Models\User;
use App\Service\ResponseGenerator\ResponseGenerator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    public function __invoke(array $validatedUserRequest): array
    {
        $user = User::where('user_name', $validatedUserRequest['user_name'])->first();

        if(!$user){
            return ResponseGenerator::notFoundResponse('User Not Found');
        }

        if($this->isUserExisting($user, $validatedUserRequest)){

            return ResponseGenerator::responseWithData(
                'user_details',
                [
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'user_name' => $user->user_name,
                    'role' => $user->role,
                    'token' => GenerateAccessToken::execute($user),
                ]
            );
        }

        return ResponseGenerator::notFoundResponse('User Not Found');
    }

    private function isUserExisting(User $user, array $validatedUserRequest) : bool
    {
        return $user->user_name === $validatedUserRequest['user_name'] &&
        Hash::check($validatedUserRequest['user_password'], $user->password);
    }

}
