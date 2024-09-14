<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemOrderRequest extends FormRequest
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
            
        'operation_order_id' => 'required|exists:operation_orders,id',
        'item_id' => 'required|exists:items,id',
        'description_ar' => 'required|string|max:255',
        'description_en' => 'nullable|string|max:255',
        'quantity' => 'required|integer|min:1',
        'unit_price' => 'required|numeric|min:0|max:999999.99',
        'total_price_before_tax' => 'required|numeric|min:0|max:999999.99',
        'tax' => 'nullable|numeric|min:0|max:99.99',
        'total_price_after_tax' => 'required|numeric|min:0|max:999999.99',
        'vat' => 'nullable|numeric|min:0|max:99.99',
        'total_price_after_vat' => 'required|numeric|min:0|max:999999.99',
        'status' => 'required|in:delivered,not_delivered',
         ];
    }
}
