<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOperatingOrderRequest extends FormRequest
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
            'client_id' => 'required|exists:customers,id', // Ensures the client_id exists in the customers table
            'order_number' => 'required|string|max:255|unique:operation_orders,order_number', // Ensures order_number is unique and not too long
            'order_date' => 'required|date', // Ensures the order_date is a valid date
            'status' => 'required|in:in_progress,completed,pending', // Ensures status is one of the specified values
            'payment_status' => 'required|in:paid,unpaid', // Ensures payment_status is one of the specified values
            'total_amount' => 'required|numeric|min:0', // Ensures total_amount is a valid decimal number and not negative
        ];
    }
}
