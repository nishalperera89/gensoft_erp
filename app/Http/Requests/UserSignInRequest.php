<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules;
use App\Service\GenerateErrorThrowMessage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\Validation\ValidationRule;

class UserSignInRequest extends FormRequest
{
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
            'user_name' => ['required', 'string', 'max:100','min:3'],
            'user_password' => ['required', Rules\Password::default()],
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        GenerateErrorThrowMessage::execute($validator);
    }
}
