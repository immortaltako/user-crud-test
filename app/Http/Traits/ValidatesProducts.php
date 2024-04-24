<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait ValidatesProducts
{
    /**
     * Validates the product data from the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validateProduct(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'sku' => ['required', 'string', 'max:255'],
            'category_id' => 'nullable|integer|exists:categories,id',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'],
            'units_sold' => 'required|integer|min:0',
        ]);
    }
}
