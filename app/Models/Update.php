<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Update extends Model
{
    use HasFactory  , SoftDeletes;
    protected $fillable = [
        'operating_order_id',
        'description_ar',
        'description_en',
        'file_path',
     ];


      public function operatingOrders()
    {
        return $this->belongsTo(OperatingOrder::class, 'operating_order_id');
    }



}
 