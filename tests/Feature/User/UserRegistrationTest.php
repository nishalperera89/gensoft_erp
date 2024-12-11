<?php

use App\Models\User;
use App\Models\UserContactInformation;
use App\Models\UserResidentialDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;

uses(RefreshDatabase::class);

it('test user can register', function () {
    $demoUser = User::factory()->create();

    Sanctum::actingAs($demoUser, ['server:demo']);

    $employeeUser = User::factory()->make([
        'role' => 2,
        'password' => '12345678',
    ])->toArray();

    $employeeUserResidentialDetails = UserResidentialDetail::factory()->make()->toArray();
    $employeeUserContactInformation = UserContactInformation::factory()->make()->toArray();

    $employeeUserAllDetails =  collect($employeeUser)
        ->merge($employeeUserResidentialDetails)
        ->merge($employeeUserContactInformation)
        ->toArray();

    $response = $this->post('api/user-register', $employeeUserAllDetails);

    $response->assertStatus(200);
    $response->assertJsonStructure([
        'status',
        'message',
    ]);

    $this->assertDatabaseHas('users', [
        'title' =>  $employeeUser['title'],
        'initials' => $employeeUser['initials'],
        'first_name' => $employeeUser['first_name'],
        'middle_name' => $employeeUser['middle_name'],
        'last_name' => $employeeUser['last_name'],
        'nickname' => $employeeUser['nickname'],
        'date_of_birth' => $employeeUser['date_of_birth'],
        'place_of_birth' => $employeeUser['place_of_birth'],
        'gender' => $employeeUser['gender'],
        'marital_status' => $employeeUser['marital_status'],
        'blood_type' => $employeeUser['blood_type'],
        'citizenship' => $employeeUser['citizenship'],
        'photo' => $employeeUser['photo'],
        'user_name' => $employeeUser['user_name'],
        'email' => $employeeUser['email'],
        'role' => $employeeUser['role'],
    ]);
    $this->assertDatabaseHas('user_residential_details', [
        'address_line_1' => $employeeUserResidentialDetails['address_line_1'],
        'address_line_2' => $employeeUserResidentialDetails['address_line_2'],
        'city' => $employeeUserResidentialDetails['city'],
        'country' => $employeeUserResidentialDetails['country'],
        'postal_code' => $employeeUserResidentialDetails['postal_code'],
    ]);
    $this->assertDatabaseHas('user_contact_informations', [
        'mobile_number' => $employeeUserContactInformation['mobile_number'],
        'telephone_number' => $employeeUserContactInformation['telephone_number'],
        'telegram_id' => $employeeUserContactInformation['telegram_id'],
        'email_address' => $employeeUserContactInformation['email_address'],
        'linkedin_account' => $employeeUserContactInformation['linkedin_account'],
        'personal_website' => $employeeUserContactInformation['personal_website'],
    ]);
});

it('test return bad response if user registration is getting failed', function () {

    $demoUser = User::factory()->create();

    Sanctum::actingAs($demoUser, ['server:demo']);

    $employeeUser = User::factory()->make([
        'user_name' => '',
        'role' => 2,
        'password' => '12345678',
    ])->toArray();

    $employeeUserResidentialDetails = UserResidentialDetail::factory()->make()->toArray();
    $employeeUserContactInformation = UserContactInformation::factory()->make()->toArray();

    $employeeUserAllDetails =  collect($employeeUser)
        ->merge($employeeUserResidentialDetails)
        ->merge($employeeUserContactInformation)
        ->toArray();

    $response = $this->post('api/user-register', $employeeUserAllDetails);


    $response->assertStatus(200);
    $response->assertJsonStructure([
        'status',
        'error'
    ]);
    $response->assertExactJson([
        'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
        'error' => [
            'user_name' => ['The user name field is required.']
        ],
    ]);

});
