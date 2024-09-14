<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory  , SoftDeletes;

    protected $fillable = ['order_item_id', 'description_ar' , 'description_en', 'quantity', 'unit_price', 'total_price_before_tax', 'tax', 'total_price_after_tax'];

    public function orderItems()
    {
        return $this->belongsTo(ItemOrder::class, 'order_item_id');
    }
}
