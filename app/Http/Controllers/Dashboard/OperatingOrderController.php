<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\IOperatingOrderRepository;
use App\Repositories\ICustomerRepository;  //RepresentativeRepository
use App\Repositories\IRepresentativeRepository;  //RepresentativeRepository
use App\Repositories\IItemOrderRepository;  //RepresentativeRepository
use App\Repositories\IAttachmentRepository;  //RepresentativeRepository
use App\Repositories\IPaymentRepository;  //RepresentativeRepository
use App\Repositories\IUpdateRepository;  //RepresentativeRepository
use App\Repositories\IPurchaseOrderRepository;
use App\Models\OperatingOrder;
use App\Http\Requests\StoreOperatingOrderRequest;
use App\Http\Requests\UpdateOperatingOrderRequest;
use App\Services\OrderItemsDatatableService ; // 
use App\Services\PurchaseOrderItemsDatatableService ; // 
use App\Services\PaymentOrderItemsDatatableService ; // 
use App\Services\UpdatesDatatableService ; // 
use App\Services\AttachmentDatatableService ; // 



class OperatingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    private  
            $customerRepository  ,
            $representativeRepository    , 
            $itemOrderRepository   , 
            $attachmentRepository  ,
            $paymentRepository      , 
            $purchaseOrderRepository ,
            $updateRepository   
            ;

    public function __construct(
    IOperatingOrderRepository $operatingOrderRepository   ,
    ICustomerRepository       $customerRepository  , 
    IRepresentativeRepository $representativeRepository  , 
    IAttachmentRepository     $attachmentRepository  ,
    IPaymentRepository        $paymentRepository   , 
    IPurchaseOrderRepository  $purchaseOrderRepository ,
    IUpdateRepository  $updateRepository    ,
    IItemOrderRepository $itemOrderRepository

    ){

        $this->operatingOrderRepository = $operatingOrderRepository;
        $this->customerRepository = $customerRepository;
        $this->representativeRepository = $representativeRepository;
        $this->attachmentRepository = $attachmentRepository;
        $this->paymentRepository = $paymentRepository;
        $this->purchaseOrderRepository = $purchaseOrderRepository;
        $this->updateRepository = $updateRepository;
        $this->itemOrderRepository = $itemOrderRepository;
    }





    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOperatingOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperatingOrderRequest $request)
    {
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OperatingOrder  $operatingOrder
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request , 
    OrderItemsDatatableService $orderItemsDatatableService , 
    PurchaseOrderItemsDatatableService  $purchaseOrderItemsDatatableService  ,
    PaymentOrderItemsDatatableService   $paymentOrderItemsDatatableService  , 
    UpdatesDatatableService             $updatesDatatableService   , 
    AttachmentDatatableService             $attachmentDatatableService   , 

    
    
    )
    {
        $operating_order = $this->operatingOrderRepository->findWith(1 , ['customer','invoice',  'representative' ,'attachments' ,   'orderItems.item' , 'updates'  , 'orderItems.purchaseOrders']);
        $item_order = $this->itemOrderRepository->getWith(['item'  , 'operatingOrder']);
        $payment_order = $this->paymentRepository->getWith(['operatingOrder.orderItems', 'collector']);
        $totalAmount = $this->paymentRepository->getTotalAmountByOperatingOrder(1);
        $purchaseOrders = $this->purchaseOrderRepository->getWith(['orderItems' ]);
        $totalPriceAfterTax = 0;
             foreach ($purchaseOrders as $purchaseOrder) {
                 if($purchaseOrder->orderItems['operating_order_id']  == 1)
                {
                    $totalPriceAfterTax += floatval($purchaseOrder->total_price_after_tax);
                }
            }
        $orderItems = $operating_order->orderItems;


            if ($request->ajax()) {
                try {
                    $serviceType = $request->input('service_type');
                     switch ($serviceType) {
                        case 'order_items':
                            return $orderItemsDatatableService->handle($request, $orderItems);
                        
                        case 'purchase_order_items':
                            
                            $allPurchaseOrders = collect();
                            foreach ($orderItems as $orderItem) {
                                $allPurchaseOrders = $allPurchaseOrders->merge($orderItem->purchaseOrders);
                            }
 
                            return $purchaseOrderItemsDatatableService->handle($request, $allPurchaseOrders );
                        
                         case 'operating_order_payment':
                         
                                return $paymentOrderItemsDatatableService->handle($request, $payment_order );

                         case 'updates_order':  //order_items_attachment
                         
                          return $updatesDatatableService->handle($request, $operating_order->updates );
                            

                          case 'order_items_attachment':  //order_items_attachment
 
                            return $attachmentDatatableService->handle($request, $operating_order->attachments );
                        default:
                            return response([
                                'message' => 'Invalid service type specified.',
                            ], 400);
                    }
                } catch (Throwable $e) {
                    return response([
                        'message' => $e->getMessage(),
                    ], 500);
                }
            return response([
                'message' => 'Invalid request.',
            ], 400);
        }
   
           return view('dashboard.pages.operating-command.details' , compact('operating_order'    , 'item_order' , 'totalAmount'  , 'totalPriceAfterTax'));
        
    }
   
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OperatingOrder  $operatingOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(OperatingOrder $operatingOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOperatingOrderRequest  $request
     * @param  \App\Models\OperatingOrder  $operatingOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {     
        $update_element = $request->input('updateElement');

         switch ($update_element) {
            case 'status':
                    return  $this->operatingOrderRepository->update(['status' => $request['status']],  $request['operatingOrderId']);
            case 'order_importance':
                    return  $this->operatingOrderRepository->update(['order_importance' => $request['status']],  $request['operatingOrderId']);
    
            case 'payment_status':
                    return  $this->operatingOrderRepository->update(['payment_status' => $request['status']],  $request['operatingOrderId']);
             
             
            case 'close_order':

                     return  $this->operatingOrderRepository->update(['status' => "canceled"],  $request['operatingOrderId']);
          
    
    }      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperatingOrder  $operatingOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperatingOrder $operatingOrder)
    {
        //
    }
}
