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
    public function messages()
    {
        return [
            'operation_order_id.required' => __('validation.operation_order_id.required'),
            'operation_order_id.exists' => __('validation.operation_order_id.exists'),


            'item_id.required' => __('validation.item_id.required'),
            'item_id.exists' => __('validation.item_id.exists'),

            'description_ar.required' => __('validation.description_ar.required'),
            'description_ar.string' => __('validation.description_ar.string'),
            'description_ar.max' => __('validation.description_ar.max'),

            'description_en.required' => __('validation.description_en.required'),
            'description_en.string' => __('validation.description_en.string'),
            'description_en.max' => __('validation.description_en.max'),

            'quantity.required' => __('validation.quantity.required'),
            'quantity.integer' => __('validation.quantity.integer'),
            'quantity.min' => __('validation.quantity.min'),

            'unit_price.required' => __('validation.unit_price.required'),
            'unit_price.numeric' => __('validation.unit_price.numeric'),
            'unit_price.min' => __('validation.unit_price.min'),
            'unit_price.max' => __('validation.unit_price.max'),

            'total_price_before_tax.required' => __('validation.total_price.required'),
            'total_price_before_tax.numeric' => __('validation.total_price.numeric'),
            'total_price_before_tax.min' => __('validation.total_price.min'),
            'total_price_before_tax.max' => __('validation.total_price.max'),

            'tax.numeric' => __('validation.tax.numeric'),
            'tax.min' => __('validation.tax.min'),
            'tax.max' => __('validation.tax.max'),


            'total_price_after_tax.required' => __('validation.total_price.required'),
            'total_price_after_tax.numeric' => __('validation.total_price.numeric'),
            'total_price_after_tax.min' => __('validation.total_price.min'),
            'total_price_after_tax.max' => __('validation.total_price.max'),


            'status.required' => __('validation.payment_status.required'),
            'status.max' => __('validation.payment_status.in'),


        ];
    }

    
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
    }

    
}
