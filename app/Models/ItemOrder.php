<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    use HasFactory ,SoftDeletes;

    protected $table =  "order_items";
    protected $fillable = ['operating_order_id', 'order_id', 'description_ar'  ,'description_en', 'delivered_quantity' , 'quantity', 'unit_price', 'tax','total_price_before_tax'  ,'total_price_after_tax', 'vat' ,'total_price_after_vat'  ,'expenses', 'status' , 'notes'];

    public function operatingOrder()
    {
        return $this->belongsTo(OperatingOrder::class, 'operating_order_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class, 'order_item_id');
    }





}
 