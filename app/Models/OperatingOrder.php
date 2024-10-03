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
    public static function findWithRelations($id)
    {
        return self::with([
            'customer', 
            'invoice', 
            'representative', 
            'attachments', 
            'payments', 
            'orderItems.item', 
            'updates', 
            'orderItems.purchaseOrders'
        ])->find($id);
    }
    protected static function boot()
    {
        parent::boot();
    
        static::deleting(function ($operatingOrder) {
            // Soft delete related records
            $operatingOrder->orderItems()->each(function ($itemOrder) {
                $itemOrder->delete(); // This will call the soft delete
            });
    
            $operatingOrder->payments()->each(function ($payment) {
                $payment->delete(); // Soft delete payments
            });
    
            $operatingOrder->attachments()->each(function ($attachment) {
                $attachment->delete(); // Soft delete attachments
            });
    
            $operatingOrder->updates()->each(function ($update) {
                $update->delete(); // Soft delete updates
            });
    
            $operatingOrder->invoices()->each(function ($invoice) {
                $invoice->delete(); // Soft delete invoices
            });
     
        });
    }

    public function updateStatus($updateElement, $status)
    {
        switch ($updateElement) {
            case 'status':
                return $this->update(['status' => $status]);
    
            case 'order_importance':
                return $this->update(['order_importance' => $status]);
    
            case 'payment_status':
                return $this->update(['payment_status' => $status]);
    
            case 'close_order':
                return $this->update(['status' => "canceled"]);
    
            default:
                throw new \InvalidArgumentException('Invalid update element');
        }
    }

    public function getFinancialData($paymentRepository, $id) : array
    {
        $totalAmountOfOperatingOrder = $this->total_amount; 
        $totalAmountPaymentsOfOrder = $paymentRepository->getTotalAmountByOperatingOrder($id);
        $totalPriceOfPurchasesAfterTax = $this->calculateTotalPriceAfterTax($this->orderItems->flatMap->purchaseOrders, $id);

        $remainingPayments = $totalAmountOfOperatingOrder - $totalAmountPaymentsOfOrder; 
        $totalExpenses = $totalAmountOfOperatingOrder - $totalPriceOfPurchasesAfterTax;

        return [
            'total_amount' => $totalAmountOfOperatingOrder,
            'total_payments' => $totalAmountPaymentsOfOrder,
            'total_price_of_purchases_after_tax' => $totalPriceOfPurchasesAfterTax,
            'remaining_payments' => $remainingPayments,
            'total_expenses' => $totalExpenses,
        ];
    }
    public function calculateTotalPriceAfterTax($purchaseOrders, $id)
    {
        return $purchaseOrders->sum(function ($purchaseOrder) use ($id){
            return $purchaseOrder->orderItems['operating_order_id'] == $id ? floatval($purchaseOrder->total_price_after_tax) : 0;
        });   
    
    }

    public static function getOperatingOrderWithPayments($operatingOrderId)
    {
        return self::with('payments')->findOrFail($operatingOrderId);
    }
    public function updatePaymentStatus()
    {
        $totalAmountPaid = $this->payments->sum('amount');
        $residual = $this->total_amount - $totalAmountPaid;

        if ($residual == 0.00) {
            $this->update(['payment_status' => 'paid']);
        } elseif ($residual > 0.00) {
            $this->update(['payment_status' => 'partially-paid']);
        } else {
            $this->update(['payment_status' => 'unpaid']);
        }
    }
 

 
}
