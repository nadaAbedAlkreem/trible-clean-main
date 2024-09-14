<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinancialDetailRequest extends FormRequest
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
            'sales' => 'required|numeric|min:0|max:999999999999.99',
            'expenses' => 'required|numeric|min:0|max:999999999999.99',
            'profit' => 'required|numeric|min:0|max:999999999999.99',
        ];
    }
}
