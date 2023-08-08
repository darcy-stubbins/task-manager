<?php

namespace App\Http\Requests;

class LoginRequest extends ApiRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|email|exists:users', 
            'password'=>'required', 
            'token_name'=>'required',
        ];
    }

    public function messages(): array {
        return [
            'email.required' => 'you need to input an email',  
            'email.email' => 'you need to input a valid email', 
            'password.required' => 'You need to input a password',
        ];
    }
}
