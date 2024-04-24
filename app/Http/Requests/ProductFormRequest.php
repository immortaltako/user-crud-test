<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $product = $this->route('product');
        return [
            'name' => 'required|string|max:255',
            'sku' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($product)],
            'category_id' => 'nullable|integer|exists:categories,id',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'units_sold' => 'required|integer|min:0',
        ];
    }
}
