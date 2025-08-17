<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'delivery_name' => 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'delivery_name.required' => 'Vui lòng nhập tên danh mục',
            'delivery_name.min' => 'Tên danh mục phải có ít nhất 6 ký tự',
        ];
    }
}
