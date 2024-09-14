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
}
