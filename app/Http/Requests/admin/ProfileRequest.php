<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'id' => 'required|exists:admins',
            'name' => 'required|min:3|max:15',
            'email' => 'required|email|unique:admins,email,'.$this->id,
            'password' => 'nullable|confirmed|min:8',
        ];
    }

//    public function messages()
//    {
//        return [
//
//        ];
//    }
}
