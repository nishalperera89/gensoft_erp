<?php

use App\Action\Auth\GenerateAccessToken;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('test generate sanctum token according to the user ability', function () {

    $user = User::factory()->create();

    $token = GenerateAccessToken::execute($user);

    $this->assertIsString($token);
    $this->assertNotEmpty($token);
    $this->assertDatabaseHas('personal_access_tokens', [
        'tokenable_id' => $user->id,
        'tokenable_type' => get_class($user), //User::class,

    ]);
});
