<?php
 
namespace App\Repositories\Eloquent;

use App\Models\Invoice;
use App\Repositories\IInvoiceRepository;

class InvoiceRepository extends BaseRepository implements IInvoiceRepository
{
    public function __construct()
    {
        $this->model = new Invoice();
    }
    
 
}
