<?php

namespace App\Http\Requests;

class StoreStatusRequest extends ApiRequest
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
            'title'=>'required|max:255', 
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'you need a title',
            'title.max' => 'the title is too long.'
        ];
    }
}
