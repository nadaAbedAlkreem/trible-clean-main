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
            'operating_order_id' => 'required|exists:operating_orders,id', // Ensure the operation_order_id exists in the operation_orders table
            'file_type' => 'required|string|max:255', // Ensure file_type is a string and not too long
            'file_name' => 'max:255', // Ensure file_type is a string and not too long
            'file_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ensure file_path is a string and not too long
     
        ];
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