<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'address',
    ];

    public function operatingOrders()
    {
        return $this->hasMany(OperatingOrder::class);
    }
}
