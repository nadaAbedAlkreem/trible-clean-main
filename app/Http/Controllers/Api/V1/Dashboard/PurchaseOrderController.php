<?php

namespace App\Http\Controllers\Api\V1\Dashboard;
use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Repositories\IPurchaseOrderRepository;
use App\Repositories\IOperatingOrderRepository;
use App\Http\Requests\StorePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use App\Traits\ResponseTrait;
use App ; 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class PurchaseOrderController extends Controller
{
    use   ResponseTrait ; 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $purchaseOrderRepository ;

     public function __construct(IPurchaseOrderRepository $purchaseOrderRepository , IOperatingOrderRepository $operatingOrderRepository   ){
 
         $this->purchaseOrderRepository = $purchaseOrderRepository;
         $this->operatingOrderRepository = $operatingOrderRepository;
         
     }

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
     * @param  \App\Http\Requests\StorePurchaseOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseOrderRequest  $request
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try
      {
        $this->purchaseOrderRepository->delete($id); 
         return  $this->successResponse('DELETE_SUCCESS', [], 201, App::getLocale())  ; 
      }catch (ModelNotFoundException $e) 
      {
         return $this->errorResponse('DELETE_FAILED', [],  422, App::getLocale());
      }

      
    }


   
}
