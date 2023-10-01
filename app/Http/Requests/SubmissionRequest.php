<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmissionRequest extends FormRequest
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
            'organization_id' => 'required',
            'category_id' => 'required',
            'name' => 'nullable',
            'email' => 'nullable',
            'number' => 'nullable',
            'address' => 'nullable',
            'date' => 'nullable',
            'gender' => 'nullable',
            'description' => 'nullable',

        ];
    }
}
