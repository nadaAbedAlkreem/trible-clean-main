<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory   , SoftDeletes;

    protected $fillable = [
        'operating_order_id',
        'file_path',
        'number_invoice',
        'amount_Invoice',
    ];

    public function operatingOrders()
    {
        return $this->belongsTo(OperatingOrder::class, 'operating_order_id');
    }
}
