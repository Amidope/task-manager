<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLabelRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('label')['id'];
        return [
            'name' => 'required|max:255|unique:labels,name,' . $id,
            'description' => 'max:255'
        ];
    }
    public function messages(): array
    {
        return [
            'name.unique' => __('validation.label.unique'),
        ];
    }
}
