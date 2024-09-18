<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class StoreUpdateRequest extends FormRequest
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
            'file_path' => 'file|mimes:jpeg,png,pdf|max:2048',
            'description_ar' => 'required|string|max:255',
         ];
    }

    public  function getDataWithImage()
    {
        $data=$this->validated();

         if ($this->hasFile('file_path')) 
        {
            $path = 'uploads/images/updates/';
            $nameImage = time()+rand(1,10000000).'.'. $this->file('file_path')->getClientOriginalExtension();
            Storage::disk('public')->put($path.$nameImage, file_get_contents( $this->file('file_path') ));
            $data['file_path'] = $path.$nameImage ;
        }
         return $data;
    }
}
