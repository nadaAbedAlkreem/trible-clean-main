<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Repositories\IPurchaseOrderRepository;
use App\Repositories\IOperatingOrderRepository;
use App\Http\Requests\StorePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;

class PurchaseOrderController extends Controller
{
    
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
         $this->purchaseOrderRepository->delete($id);
          $totalPriceAfterTax = 0;
            $purchase_orders  = $this->purchaseOrderRepository->getWith(['orderItems' ]);
             $operating_order = $this->operatingOrderRepository->findOne(1);
             foreach ($purchase_orders as $purchaseOrder) {
               if(!empty($purchaseOrder)){
                   if(!empty($purchaseOrder->orderItems)){
                   if($purchaseOrder->orderItems['operating_order_id']  == 1)
                {
                    $totalPriceAfterTax += floatval($purchaseOrder->total_price_after_tax);
                }
                   }
               }
            }
                         $profit          = $operating_order->total_amount - $totalPriceAfterTax    ; 

            
              return response()->json([
             'totalPriceAfterTax' => $totalPriceAfterTax ,
             'profit'             => $profit
        ]);
    }
}
