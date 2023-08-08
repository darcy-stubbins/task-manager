<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            'token_name'=>'required', 
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'you need to input your name',  
            'email.required' => 'you need to input an email',  
            'email.email' => 'you need to input a valid email', 
            'email.unique' => 'this email is already in use', 
            'password.required' => 'You need to input a password',
            'password.confirmed' => 'The two passwords don\'t match', 
        ];
    }

    protected function failedValidation(Validator $validator) { 
        throw new HttpResponseException(response()->json($validator->errors(), 422)); 
    }
}



