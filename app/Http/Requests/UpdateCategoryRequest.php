<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can('update categories');
    }

    public function rules(): array
    {
        return [

            'name' => [

                'required',
                'string',
                'max:100',

                Rule::unique('categories', 'name')
                    ->ignore($this->route('category'))

            ],

            'description' => [
                'nullable',
                'string',
            ],

            'is_active' => [
                'required',
                'boolean',
            ],

        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'category name',
            'description' => 'description',
            'is_active' => 'status',
        ];
    }
}