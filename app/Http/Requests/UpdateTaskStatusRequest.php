<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use function __;
use function auth;

class UpdateTaskStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $id = $this->route('task_status')['id'];
        \Log::info($id);

        return [
            'name' => 'required|unique:task_statuses|max:255' . $id,
        ];
    }
    public function messages(): array
    {
        return [
            'name.unique' => __('validation.task_status.unique')
        ];
    }
}
