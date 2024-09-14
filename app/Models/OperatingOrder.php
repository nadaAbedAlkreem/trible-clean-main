<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OperatingOrder extends Model
{
 
    use HasFactory, SoftDeletes;

    protected $fillable = ['customers_id', 'order_number', 'order_date', 'status', 'payment_status', 'total_amount'];
    protected $table = "operating_orders"  ; 
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

 


    public function orderItems()
    {
        return $this->hasMany(ItemOrder::class, 'operating_order_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'operating_order_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'operating_order_id');
    }

    public function representative()
    {
        return $this->belongsTo(Representative::class, 'representative_id');
    }

    public function updates()
    {
        return $this->hasMany(Update::class  ,'operating_order_id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class  ,'operating_order_id');
    }

    public function findOne($id)
    {
            return $this->model->with([
                'customer',
                'representative',
                'orderItems',
                'attachments',
                'payments'
            ])->find($id);
    }


 
}
