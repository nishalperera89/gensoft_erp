<?php

namespace App\Action\User;

use App\Models\User;
use App\Models\UserContactInformation;
use App\Models\UserResidentialDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserDetailsStore
{
    public function UserBasicDetailsStore(array $validatedUserRegisterRequest): void
    {
        $user = User::create([
            'id' => Str::uuid(),
            'title' => $validatedUserRegisterRequest['title'],
            'initials' => $validatedUserRegisterRequest['initials'],
            'first_name' => $validatedUserRegisterRequest['first_name'],
            'middle_name' => $validatedUserRegisterRequest['middle_name'],
            'last_name' => $validatedUserRegisterRequest['last_name'],
            'nickname' => $validatedUserRegisterRequest['nickname'],
            'date_of_birth' => $validatedUserRegisterRequest['date_of_birth'],
            'place_of_birth' => $validatedUserRegisterRequest['place_of_birth'],
            'gender' => $validatedUserRegisterRequest['gender'],
            'marital_status' => $validatedUserRegisterRequest['marital_status'],
            'blood_type' => $validatedUserRegisterRequest['blood_type'],
            'citizenship' => $validatedUserRegisterRequest['citizenship'],
            'photo' => $validatedUserRegisterRequest['photo'],
            'email' => $validatedUserRegisterRequest['email'],
            'user_name' => $validatedUserRegisterRequest['user_name'],
            'role' => $validatedUserRegisterRequest['role'],
            'password' => Hash::make($validatedUserRegisterRequest['password']),
        ]);

        $this->UserResidentialDetailStore($user->id, $validatedUserRegisterRequest);
        $this->UserContactInformationStore($user->id, $validatedUserRegisterRequest);
    }

    public function UserResidentialDetailStore(string $userId, array $validatedUserRegisterRequest):void
    {
        UserResidentialDetail::create([
            'user_id' => $userId,
            'address_line_1' => $validatedUserRegisterRequest['address_line_1'],
            'address_line_2' => $validatedUserRegisterRequest['address_line_2'],
            'city' => $validatedUserRegisterRequest['city'],
            'country' => $validatedUserRegisterRequest['country'],
            'postal_code' => $validatedUserRegisterRequest['postal_code'],
        ]);
    }

    public function UserContactInformationStore(string $userId, array $validatedUserRegisterRequest): void
    {
        UserContactInformation::create([
            'user_id' => $userId,
            'mobile_number' => $validatedUserRegisterRequest['mobile_number'],
            'telephone_number' => $validatedUserRegisterRequest['telephone_number'],
            'telegram_id' => $validatedUserRegisterRequest['telegram_id'],
            'email_address' => $validatedUserRegisterRequest['email_address'],
            'linkedin_account' => $validatedUserRegisterRequest['linkedin_account'],
            'personal_website' => $validatedUserRegisterRequest['personal_website'],
        ]);
    }
}
