<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\CustomerResource;
use App\Http\Resources\Api\ItemOrderResource;
use App\Http\Resources\Api\PaymentResource;
use App\Http\Resources\Api\UpdateResource;
use App\Http\Resources\Api\AttachmentResource;
use App\Http\Resources\Api\InvoiceResource;
use App\Http\Resources\Api\RepresentativeResource;

class OperatingOrderResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'order_number' => $this->order_number,
            'order_date' => $this->order_date,
            'status' => $this->status,
            'payment_status' => $this->payment_status,
            'total_amount' => $this->total_amount, //representative
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'orderItems' => ItemOrderResource::collection($this->whenLoaded('orderItems')),
            'payments' => PaymentResource::collection($this->whenLoaded('payments')),
            'updates' => UpdateResource::collection($this->whenLoaded('updates')),
            'attachments' => AttachmentResource::collection($this->whenLoaded('attachments')),
            'invoices' => InvoiceResource::collection($this->whenLoaded('invoice')),
            'representative' =>new RepresentativeResource($this->whenLoaded('representative')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    
    }
}
