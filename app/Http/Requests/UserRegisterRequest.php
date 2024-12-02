<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserRegisterRequest extends FormRequest
{

    public array $commonRule = ['required', 'string', 'min:1', 'max:191'];

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
            'first_name' => $this->commonRule,
            'last_name' => $this->commonRule,
            'user_name' => $this->commonRule,
            'email' => $this->commonRule,
            'role' => ['required','integer','min:0','max:10'],
            'password' => $this->commonRule,
        ];
    }
}
