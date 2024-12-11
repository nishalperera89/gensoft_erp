<?php

namespace App\Action\User;

use App\Models\User;
use App\Models\UserContactInformation;
use App\Models\UserResidentialDetail;
use App\Service\ResponseGenerator\ResponseGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserRegister
{
    public function __invoke(array $validatedUserRegisterRequest): array
    {
        try {
            DB::beginTransaction();

            (new UserDetailsStore())->UserBasicDetailsStore($validatedUserRegisterRequest);

            DB::commit();

            return ResponseGenerator::sendSuccessResponse('User registered successfully');

        }
        catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
        }

        return ResponseGenerator::badResponse();
    }
}
