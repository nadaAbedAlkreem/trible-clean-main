<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return 
       [
        'id' => $this->id,
        'operating_order_id' => $this->operating_order_id,
        'file_path' => $this->file_path,
        'number_invoice' => $this->number_invoice,
        'amount_invoice' => $this->amount_Invoice,
        'operating_order' => new OperatingOrderResource($this->whenLoaded('operatingOrders')), // Load item as a single instance

        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,

       ]

        ;
    }
}
