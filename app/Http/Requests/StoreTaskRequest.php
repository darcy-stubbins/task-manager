<?php

namespace App\Http\Requests;

class StoreTaskRequest extends ApiRequest
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
            'title'=>'required',
            'content'=>'required',
            'delegator_id'=>'required|numeric|exists:users,id',
            'delegate_id'=>'required|numeric|exists:users,id', 
            'deadline'=>'required|date', 
            'status_id'=>'required|numeric', 
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'you need a title',
            'content.required' => 'you need content', 
            'delegator_id.required' => 'you need somone to manage this task',
            'delegator_id.exists' => 'this delegator doesn\'t exist',
            'delegate_id.required' => 'you need to assign this to someone', 
            'delegate_id.exists' => 'this delegate doesn\'t exist', 
            'deadline.required' => 'you need to assign a deadline', 

        ];
    }
}
