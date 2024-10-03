<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseOrderResource extends JsonResource
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
            'order_item_id' => $this->order_item_id,
            'description_ar' => $this->description_ar,
            'description_en' => $this->description_en,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
            'total_price_before_tax' => $this->total_price_before_tax,
            'tax' => $this->tax,
            'operating_order' => new OperatingOrderResource($this->whenLoaded('operatingOrders')), // Load item as a single instance
            'order_item' => new ItemOrderResource($this->whenLoaded('orderItems')), // Load item as a single instance
            'total_price_after_tax' => $this->total_price_after_tax,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    
    
    }
}
