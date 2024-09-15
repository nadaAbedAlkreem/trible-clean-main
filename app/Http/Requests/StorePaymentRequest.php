<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use App\Rules\LessThanOrEqualToResidual;
use App\Rules\ResidualEqualToZero;

class StorePaymentRequest extends FormRequest
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
        $remaining = floatval($this->input('remaining'));

         return [
            'operating_order_id' => 'required|exists:operating_orders,id', // Ensures the operation_order_id exists in the operation_orders table
            'amount' => ['required', 'numeric', 'min:0',new ResidualEqualToZero($remaining) , new LessThanOrEqualToResidual($remaining)],
            'payment_date' => 'required|date', // Ensures payment_date is a valid date
            'payment_method' => 'required|string|max:255', // Ensures payment_method is a string and not too long
            'collector_id' => 'required|numeric|exists:collectors,id', // Ensures collector is a string and not too long
            'notes' => 'nullable|string', // Ensures notes are a string if provided, but are optional
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image

        ];
    }

    public  function getDataWithImage()
    {
        $data=$this->validated();

         if ($this->hasFile('file')) 
        {
            $path = 'uploads/images/payment/';
            $nameImage = time()+rand(1,10000000).'.'. $this->file('file')->getClientOriginalExtension();
            Storage::disk('public')->put($path.$nameImage, file_get_contents( $this->file('file') ));
            $data['file'] = $path.$nameImage ;
        }
         return $data;
    }
}
