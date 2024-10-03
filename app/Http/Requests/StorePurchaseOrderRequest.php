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


    public function messages()
    {
        return [
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

            'total_price.required' => __('validation.total_price.required'),
            'total_price.numeric' => __('validation.total_price.numeric'),
            'total_price.min' => __('validation.total_price.min'),
            'total_price.max' => __('validation.total_price.max'),

            'tax.numeric' => __('validation.tax.numeric'),
            'tax.min' => __('validation.tax.min'),
            'tax.max' => __('validation.tax.max'),
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
    }
}
