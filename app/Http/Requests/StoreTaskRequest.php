<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:tasks|max:255',
            'status_id' => 'required|exists:task_statuses,id',
            'description' => 'max:255',
            'assigned_to_id' => 'nullable|integer|exists:users,id',
            'labels' => 'nullable|array'
        ];

    }

    public function messages(): array
    {
        return [
            'name' => __('validation.task.unique')
        ];
    }
}
