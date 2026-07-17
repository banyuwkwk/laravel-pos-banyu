<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'cart' => [
                'required',
                'array',
                'min:1',
            ],

            'cart.*.id' => [
                'required',
                'exists:products,id',
            ],

            'cart.*.qty' => [
                'required',
                'integer',
                'min:1',
            ],

            'cash' => [
                'required',
                'numeric',
                'min:0',
            ],

            'invoice_number' => [
            'required',
            'string',
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'cart.required' => 'Cart tidak boleh kosong.',

            'cart.min' => 'Minimal ada satu produk.',

            'cash.required' => 'Cash wajib diisi.',

            'cash.numeric' => 'Cash harus berupa angka.',

        ];
    }
}