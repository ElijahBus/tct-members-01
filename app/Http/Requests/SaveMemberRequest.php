<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveMemberRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:members',
            'school_ids' => 'required|array'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name is required',
            'email.required' => 'The email is required',
            'school_ids.required' => 'You should select at least one school',
        ];
    }
}
