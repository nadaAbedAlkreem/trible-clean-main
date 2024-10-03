<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_ar' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => __('validation.name_ar.required'),
            'name_ar.exists' => __('validation.name_ar.string'),
            'name_ar.required' => __('validation.name_ar.max'),
            'name_en.min' => __('validation.name_en.string'),
            'name_en.required' => __('validation.name_en.max'),
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
    }
}
