<?php

namespace App\Http\Requests;

use App\Service\GenerateErrorThrowMessage;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;


class UserRegisterRequest extends FormRequest
{

    private array $commonRulesWithRequired = ['required', 'string', 'min:1', 'max:191'];
    private array $commonRulesWithoutRequired = ['string', 'min:1', 'max:191'];

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'title'=> $this->commonRulesWithRequired,
            'initials'=> $this->commonRulesWithoutRequired,
            'first_name' => $this->commonRulesWithRequired,
            'middle_name'=> $this->commonRulesWithoutRequired,
            'last_name' => $this->commonRulesWithRequired,
            'nickname'=> $this->commonRulesWithoutRequired,
            'date_of_birth'=> $this->commonRulesWithoutRequired,
            'place_of_birth'=> $this->commonRulesWithoutRequired,
            'gender'=> $this->commonRulesWithoutRequired,
            'marital_status'=> $this->commonRulesWithoutRequired,
            'blood_type'=> $this->commonRulesWithoutRequired,
            'citizenship'=> $this->commonRulesWithoutRequired,
            'photo'=> $this->commonRulesWithoutRequired,
            'user_name' => $this->commonRulesWithRequired,
            'email' => $this->commonRulesWithRequired,
            'role' => ['required','integer','min:0','max:10'],
            'password' => ['required', Rules\Password::default()],

            // User Residential Details
            'address_line_1' => $this->commonRulesWithoutRequired,
            'address_line_2' => $this->commonRulesWithoutRequired,
            'city' => $this->commonRulesWithoutRequired,
            'country' => $this->commonRulesWithoutRequired,
            'postal_code' => $this->commonRulesWithoutRequired,

            // User Contact Details
            'mobile_number' => $this->commonRulesWithoutRequired,
            'telephone_number' => $this->commonRulesWithoutRequired,
            'telegram_id' => $this->commonRulesWithoutRequired,
            'email_address' => $this->commonRulesWithoutRequired,
            'linkedin_account' => $this->commonRulesWithoutRequired,
            'personal_website' => $this->commonRulesWithoutRequired,

        ];
    }

    public function failedValidation(Validator $validator): void
    {
        GenerateErrorThrowMessage::execute($validator);
    }
}
