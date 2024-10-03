<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
 

class StoreAttachmentRequest extends FormRequest
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
                'operating_order_id' => 'required|exists:operating_orders,id', // Must be present and exist in operating_orders table
                'file_type' => 'required|string|max:255', // Must be a string, max length 255 characters
                'file_name' => 'max:255', // Must be a string, max length 255 characters
                'file_path' => $this->hasFile('file_path') 
                    ? 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048' // If file is uploaded
                    : 'required|string|max:255', // If only file path is passed       
               ];
     }

     public function messages()
     {
         return [
             'operating_order_id.required' => __('messages.operating_order_id.required'),
             'operating_order_id.exists' => __('messages.operating_order_id.exists'),
             'file_path.required' => __('messages.file_path.required'),
             'file_path.image' => __('messages.file_path.image'),
             'file_name.max' => __('messages.file_name.max') , 
             'file_path.mimes' => __('messages.file_path.mimes'),
             'file_path.max' => __('messages.file_path.max'),
     
         ];
     }


     protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
     {
     }

    public  function getDataWithImage()
    {
        $data=$this->validated();
 
        if ($this->hasFile('file_path')) 
        { 
            $file_name = (!empty($data['file_name']))?  $data['file_name'] :  time()+rand(1,10000000)  ; 
            $path = 'uploads/images/'.$data['file_type'].'/';
            $nameImage = $file_name.'.'. $this->file('file_path')->getClientOriginalExtension();
            Storage::disk('public')->put($path.$nameImage, file_get_contents( $this->file('file_path') ));
            $data['file_path'] = $path.$nameImage ;
        }
         return $data;
    }

}