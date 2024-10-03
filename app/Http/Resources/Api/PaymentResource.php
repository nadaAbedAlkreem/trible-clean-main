<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'operating_order_id' => $this->operating_order_id,
            'collector_id' => $this->collector_id,
            'amount' => $this->amount,
            'payment_date' => $this->payment_date,
            'payment_method' => $this->payment_method,
            'collector' => $this->collector,
            'notes' => $this->notes,
            'file' => $this->file,
            'operating_order' => new OperatingOrderResource($this->whenLoaded('operatingOrders')), // Load item as a single instance
            'collector' => new CollectorResource($this->whenLoaded('collector')), // Load item as a single instance
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    
    }
}
