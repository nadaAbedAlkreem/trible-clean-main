<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class StoreInvoiceRequest extends FormRequest
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
            'operating_order_id' => 'required|exists:operating_orders,id', // Ensure the operation_order_id exists in the operation_orders table
            'file_path' => $this->hasFile('file_path') 
            ? 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048' // If file is uploaded
            : 'required|string|max:255', // If only file path is passed       
            'number_invoice' => 'required|numeric|min:0|max:9999999',
            'amount_Invoice' => 'required|numeric|min:0|max:9999999',
        ];
    }

    public function messages()
        {
            return [
                'operating_order_id.required' => __('validation.operating_order_id.required'),
                'operating_order_id.exists' => __('validation.operating_order_id.exists'),
                'file_path.required' => __('validation.file_path.required'),
                'file_path.image' => __('validation.file_path.image'),
                'file_path.mimes' => __('validation.file_path.mimes'),
                'file_path.max' => __('validation.file_path.max'),
                'number_invoice.required' => __('validation.number_invoice.required'),
                'number_invoice.numeric' => __('validation.number_invoice.numeric'),
                'number_invoice.min' => __('validation.number_invoice.min'),
                'number_invoice.max' => __('validation.number_invoice.max'),
                'amount_invoice.required' => __('validation.amount_invoice.required'),
                'amount_invoice.numeric' => __('validation.amount_invoice.numeric'),
                'amount_invoice.min' => __('validation.amount_invoice.min'),
                'amount_invoice.max' => __('validation.amount_invoice.max'),
            ];
        }



    
    public  function getDataWithImage()
    {
        $data=$this->validated();
        if ($this->hasFile('file_path')) 
        {
            $path = 'uploads/images/invoice/';
            $nameImage = time()+rand(1,10000000).'.'. $this->file('file_path')->getClientOriginalExtension();
            Storage::disk('public')->put($path.$nameImage, file_get_contents( $this->file('file_path') ));
            $data['file_path'] = $path.$nameImage ;
        }
         return $data;
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
    }
}
