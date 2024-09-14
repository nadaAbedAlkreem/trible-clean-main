<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'item_id' => 'required|exists:items,id',
            'description_ar' => 'required|string|max:255',
            'description_en' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0|max:999999.99',
            'total_price' => 'required|numeric|min:0|max:999999.99',
            'tax' => 'nullable|numeric|min:0|max:99.99',
        ];
    }
}
