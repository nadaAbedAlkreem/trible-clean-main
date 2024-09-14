<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collector extends Model
{
    use HasFactory   , SoftDeletes;


    public function payment()
    {
        return $this->hasMany(Payment::class, 'collector_id');
    }


}
