<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

//uses(RefreshDatabase::class);

it('test user can login to the system', function () {

    // A - Arrange
    $demoUser = User::factory()->create();

    $demoUserSignInCredentials = [
        'user_name' => $demoUser->user_name,
        'user_password' => '12345678',
    ];

    // A
    $response = $this->post('api/user-sign-in', $demoUserSignInCredentials);

    // A -Assertion
    $response->assertStatus(200);
    $response->assertJsonStructure([]);

});
