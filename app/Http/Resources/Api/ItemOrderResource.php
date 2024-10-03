<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\CustomerResource;
 

class ItemOrderResource extends JsonResource
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
            'item_id' => $this->item_id  , 
            'description_ar' => $this->description_ar,
            'description_en' => $this->description_en,
            'delivered_quantity' => $this->delivered_quantity,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
            'tax' => $this->tax,
            'total_price_before_tax' => $this->total_price_before_tax,
            'total_price_after_tax' => $this->total_price_after_tax,
            'vat' => $this->vat,
            'total_price_after_vat' => $this->total_price_after_vat,
            'expenses' => $this->expenses,
            'status' => $this->status,
            'notes' => $this->notes,
            // 'purchases' => PurchaseOrderResource::collection($this->whenLoaded('purchaseOrders')),
            'operating_order' => new OperatingOrderResource($this->whenLoaded('operatingOrders')), // Load item as a single instance
            'item' => new ItemResource($this->whenLoaded('item')), // Load item as a single instance
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    
    
    }
}
