<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserContactInformation>
 */
class UserContactInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //$user = User::factory()->create();

        return [
            //'user_id'=>$user->id,
            'mobile_number' => $this->faker->phoneNumber(),
            'telephone_number' => $this->faker->phoneNumber(),
            'telegram_id' => $this->faker->phoneNumber(),
            'email_address' => $this->faker->email(),
            'linkedin_account' => $this->faker->url(),
            'personal_website' => $this->faker->url(),
        ];
    }
}
