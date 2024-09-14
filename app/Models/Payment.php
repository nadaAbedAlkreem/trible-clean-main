<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory  , SoftDeletes ;


    protected $fillable = ['operating_order_id', 'collector_id',  'amount', 'payment_date', 'payment_method', 'collector', 'notes' , 'file'];
    public function operatingOrder()
    {
        return $this->belongsTo(OperatingOrder::class, 'operating_order_id');
    }
    public function collector()
    {
        return $this->belongsTo(Collector::class, 'collector_id');
    }



}
