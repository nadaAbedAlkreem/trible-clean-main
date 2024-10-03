<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Representative extends Model
{
    use HasFactory  , SoftDeletes;


    protected $fillable = ['name', 'phone_number', 'email'];

    public function operatingOrders()
    {
        return $this->hasMany(OperatingOrder::class, 'representative_id');
    }

    protected static function boot()
    {
        parent::boot();
    
        static::deleting(function ($representative) {
            // Soft delete related records
            $representative->operatingOrders()->each(function ($itemOrders) {
                $operatingOrders->delete(); // This will call the soft delete
            });
        });
    }
}
