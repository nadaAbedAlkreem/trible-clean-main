<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Item extends Model
{
    use HasFactory , SoftDeletes;


    protected $fillable = ['name_ar' ,'name_en'];

    public function itemOrders()
    {
        return $this->hasMany(ItemOrder::class, 'order_id');
    }

    protected static function boot()
    {
        parent::boot();
    
        static::deleting(function ($item) {
            // Soft delete related records
            $item->itemOrders()->each(function ($itemOrders) {
                $itemOrders->delete(); // This will call the soft delete
            });
        });
    }
}
