<?php

namespace App\Http\Requests;

class StoreCommentRequest extends ApiRequest
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
            'task_id'=>'required|exists:tasks,id', 
            'content'=>'required', 
        ];
    }

    public function messages(): array {
        return [
            'task_id.required' => 'you need a task to comment',
            'task_id.exists' => 'this task doesn\'t exist', 
            'content.required' => 'you need a comment', 
        ];
    }
}
