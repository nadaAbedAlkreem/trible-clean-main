<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory  , SoftDeletes;
    

    protected $fillable = ['operating_order_id', 'file_type', 'file_path'];
    protected  $table = "attachments"  ; 
    public function operatingOrder()
    {
        return $this->belongsTo(OperatingOrder::class, 'operating_order_id');
    }
}
