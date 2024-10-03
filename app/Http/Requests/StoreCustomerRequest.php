<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20|unique:customers,phone_number',
            'email' => 'required|email|max:255|unique:customers,email',
            'address' => 'required|string|max:255',
        ];
    }

    public function messages()
        {
            return [
                'name.required' => __('validation.name.required'),
                'name.string' => __('validation.name.string'),
                'name.max' => __('validation.name.max'),
                
                'phone_number.required' => __('validation.phone_number.required'),
                'phone_number.string' => __('validation.phone_number.string'),
                'phone_number.max' => __('validation.phone_number.max'),
                'phone_number.unique' => __('validation.phone_number.unique'),
                
                'email.required' => __('validation.email.required'),
                'email.email' => __('validation.email.email'),
                'email.max' => __('validation.email.max'),
                'email.unique' => __('validation.email.unique'),
                
                'address.required' => __('validation.address.required'),
                'address.string' => __('validation.address.string'),
                'address.max' => __('validation.address.max'),
            ];
        }

        public  function getDataWithImage()
        {
            $data=$this->validated();
    
            dd($data);
           
      
             return $data;
        }

}
