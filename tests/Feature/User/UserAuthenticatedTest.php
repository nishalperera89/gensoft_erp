<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;

//uses(RefreshDatabase::class);

/**
 * @param $response
 * @param \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|User $demoUser
 * @return void
 */
function assertTest(
    $response,
    int $status,
    array $jsonStructure,
    array $expected
): void
{
    $response->assertStatus($status);
    $response->assertJsonStructure($jsonStructure);
    $response->assertExactJson($expected);
}

it('test user can login to the system', function () {

    // A - Arrange
    $demoUser = User::factory()->create();

    $demoUserSignInCredentials = [
        'user_name' => $demoUser->user_name,
        'user_password' => '12345678',
    ];

    // A - Action
    $response = $this->post('api/user-sign-in', $demoUserSignInCredentials);


    // A -Assertion
    assertTest(
        $response,
        200,
        [
            'status',
            'user_details' => [
                'first_name',
                'last_name',
                'user_name',
                'role',
            ]
        ],
        [
            'status' => Response::HTTP_OK,
            'user_details' => [
                'first_name' => $demoUser->first_name,
                'last_name' => $demoUser->last_name,
                'user_name' => $demoUser->user_name,
                'role' => $demoUser->role,
            ]
        ]);

});

it('test return bad response if user not existing', function () {
    // A - Arrange
    User::factory()->create();

    $demoUserSignInCredentials = [
        'user_name' => 'test',
        'user_password' => '12345678',
    ];

    $response = $this->post('api/user-sign-in', $demoUserSignInCredentials);

    //dd($response->json());

    /*
    $response->assertStatus(200);
    $response->assertJsonStructure([
        'status',
        'message'
    ]);
    $response->assertExactJson([
        'status' => Response::HTTP_NOT_FOUND,
        'message' => Response::$statusTexts[Response::HTTP_NOT_FOUND]
    ]);
    */

    assertTest(
        $response,
        200,
        [
            'status',
            'message'
        ],
        [
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'User Not Found'
        ]);

});
