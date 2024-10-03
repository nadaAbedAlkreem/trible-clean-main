<?php

namespace App\Http\Controllers\Api\V1\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Repositories\IInvoiceRepository;
use App\Services\AttachmentDatatableService ; 
use App\Traits\ResponseTrait;
use App ; 
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InvoiceController extends Controller
{   
    use  ResponseTrait  ; 
    private $invoiceRepository ;

    public function __construct(IInvoiceRepository $invoiceRepository   ){

        $this->invoiceRepository = $invoiceRepository;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request)
    {
         try {
            $create = $this->invoiceRepository->create($request->getDataWithImage());
            return $this->successResponse('CREATE_ITEM_SUCCESSFULLY',$create, 201, App::getLocale());
        } catch (\Illuminate\Validation\ValidationException $e) {
      
            return $this->errorResponse('VETIFICATION_ERRORS', ['error' => $e->errors()], 422  ,App::getLocale()); // Return validation errors
        }
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
