<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class CategoryRequest extends FormRequest
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
        $rules = [
            'name'  => 'required|min:6',
            'slug'  => 'required|unique:categories,slug,'.$this->id,
        ];

        if ($this->has('parent_id')) {
            $rules['parent_id'] = 'required|exists:categories,id';
        }

        return $rules;
    }
}
