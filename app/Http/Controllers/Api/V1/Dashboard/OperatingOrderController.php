<?php

namespace App\Http\Controllers\Api\V1\Dashboard;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OperatingOrder;  
use App\Models\ItemOrder;  
use App\Http\Requests\StoreOperatingOrderRequest;
use App\Http\Requests\UpdateOperatingOrderRequest;
use App\Repositories\IOperatingOrderRepository;
use App\Repositories\IPaymentRepository;   

use App\Traits\ResponseTrait;
use App\Http\Resources\Api\OperatingOrderResource;
use App\Http\Resources\Api\ItemOrderResource;
use App\Http\Resources\Api\PurchaseOrderResource;
use App\Http\Resources\Api\PaymentResource;
use App\Http\Resources\Api\UpdateResource;
use App\Http\Resources\Api\AttachmentResource; 
use App\Http\Resources\Api\InvoiceResource; 


use Illuminate\Support\Facades\Cache;

 

class OperatingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ResponseTrait;

     
    private   $operatingOrderRepository   ,  $paymentRepository       ;

    public function __construct(IOperatingOrderRepository  $operatingOrderRepository   ,
        IPaymentRepository        $paymentRepository  )
    {
        $this->operatingOrderRepository = $operatingOrderRepository;
        $this->paymentRepository = $paymentRepository;
 
    }


    private function handleRequest(callable $action)
    {
        try {
            return $action();
        } catch (\Exception $e) {
            $code = $e->getCode() ?: 500; // Fallback to 500 if no code is set
            $message = $e->getMessage();
            if ($message === "ORDER_NOT_FOUND") {
                return $this->errorResponse($message, [], $code, App::getLocale());
            }
            // Handle other exceptions based on your logic
            return $this->errorResponse($message, [], $code, App::getLocale());
        }
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
    public function showOperatingOrderDetails(Request $request  , $id)  
    {
        // try {
        //     $id = $request->route('id'); 
        //     $this->checkForGettingId($id);
        //     $operatingOrder = $this->getOperatingOrderWithRelations($id);
        //     $financialData = $operatingOrder->getFinancialData($this->paymentRepository, $id);
        //     return $this->successResponse('ORDER_DETAILS_RETRIEVED',
        //      [
        //      new OperatingOrderResource($operatingOrder)  ,$financialData
        //     ] , 200,  App::getLocale());            

        // } catch (\Exception $e) 
        // {
        //      if($e->getMessage() == "ORDER_NOT_FOUND")
        //      {
        //         return $this->errorResponse($e->getMessage(),[], $e->getCode(), App::getLocale());

        //      }else 
        //      {
        //         return $this->errorResponse($e->getMessage(),[] ,  $e->getCode(), App::getLocale());

        //      }
        // }
        return $this->handleRequest(function () use ($request, $id) {
            $id = $request->route('id');
            $this->checkForGettingId($id);
            $operatingOrder = $this->getOperatingOrderWithRelations($id);
            $financialData = $operatingOrder->getFinancialData($this->paymentRepository, $id);
            return $this->successResponse('ORDER_DETAILS_RETRIEVED', [new OperatingOrderResource($operatingOrder), $financialData], 200, App::getLocale());
        });
       
    }

    public function getOrderItems(Request $request  , $id)  
    {
        
        // try {
        //     $id = $request->route('id'); 
        //     $this->checkForGettingId($id);
        //     $operatingOrder = $this->getOperatingOrderWithRelations($id);
        //     $itemOrder = Cache::remember('orderItems_' . $operatingOrder->id, 60, function () use ($operatingOrder) {
        //         return $operatingOrder->orderItems;
        //     });            
        
        //     if (!$itemOrder)
        //     {
        //         throw new \Exception('ITEM_ORDERS_NOT_FOUND', 404)  ; 
        //     }
        //     return $this->successResponse('ORDER_DETAILS_RETRIEVED', [
        //         ItemOrderResource::collection($itemOrder),
        //          ] , 200,  App::getLocale());            

        // } catch (\Exception $e) 
        // {
        //      if($e->getMessage() == "ORDER_NOT_FOUND")
        //      {
        //         return $this->errorResponse($e->getMessage(),[] , $e->getCode(), App::getLocale());

        //      }else if($e->getMessage() == "ITEM_ORDERS_NOT_FOUND" ) 
        //      {
        //         return $this->errorResponse('ITEM_ORDERS_NOT_FOUND',[] , 404  , App::getLocale());

        //      }     
        //      else 
        //      {
        //         return $this->errorResponse($e->getMessage(), [],  $e->getCode(), App::getLocale());

        //      }
        // }

        return $this->handleRequest(function () use ($request, $id) {
            $id = $request->route('id');
            $this->checkForGettingId($id);
            $operatingOrder = $this->getOperatingOrderWithRelations($id);
            $itemOrder = Cache::remember('orderItems_' . $operatingOrder->id, 60, function () use ($operatingOrder) {
                return $operatingOrder->orderItems;
            });
            if (!$itemOrder) {
                throw new \Exception('ITEM_ORDERS_NOT_FOUND', 404);
            }
            return $this->successResponse('ORDER_DETAILS_RETRIEVED', [ItemOrderResource::collection($itemOrder)], 200, App::getLocale());
        });

   
    }

    public function getPurchasesOfOrderItems(Request $request  , $id)  
    {

        return $this->handleRequest(function () use ($request, $id) {
            $id = $request->route('id');
            $this->checkForGettingId($id);
            $operatingOrder = $this->getOperatingOrderWithRelations($id);
            $allPurchaseOrderItems = $operatingOrder->orderItems->flatMap->purchaseOrders;
            if ($allPurchaseOrderItems->isEmpty()) {
                throw new \Exception('PURCHASES_ORDER_ITEMS_NOT_FOUND', 404);
            }
            return $this->successResponse('PURCHASES_ORDER_ITEMS_RETRIEVED', [PurchaseOrderResource::collection($allPurchaseOrderItems)], 200, App::getLocale());
        });
    }
     
        
  

    
    public function getPaymentsOfOrder(Request $request  , $id)  
    {
        return $this->handleRequest(function () use ($request, $id) {
            $id = $request->route('id');
            $this->checkForGettingId($id);
            
             $operatingOrder = $this->getOperatingOrderWithRelations($id);
            $paymentOrder = $operatingOrder->payments;
    
             if (!$paymentOrder) {
                throw new \Exception('PAYMENTS_ORDER_NOT_FOUND', 404);
            }
    
            return $this->successResponse('PAYMENTS_ORDER_RETRIEVED', [
                PaymentResource::collection($paymentOrder),
            ], 200, App::getLocale());
        });

              
          
    }

    public function getAttachmentsOfOrder(Request $request  , $id)  
    {
        return $this->handleRequest(function () use ($request, $id) {
            $id = $request->route('id');
            $this->checkForGettingId($id);
    
            $operatingOrder = $this->getOperatingOrderWithRelations($id);
            $allAttachmentsOrders = $operatingOrder->attachments;
    
            if (!$allAttachmentsOrders) {
                throw new \Exception('ATTACHMENTS_ORDER_NOT_FOUND', 404);
            }
    
            return $this->successResponse('ATTACHMENTS_ORDER_DETAILS_RETRIEVED', [
                AttachmentResource::collection($allAttachmentsOrders),
            ], 200, App::getLocale());
        });

       
    }

    public function getUpdatesOfOrder(Request $request  , $id)  
    {
        return $this->handleRequest(function () use ($request, $id) {
            $id = $request->route('id');
            $this->checkForGettingId($id);
    
            $operatingOrder = $this->getOperatingOrderWithRelations($id);
            $allUpdatesOrders = $operatingOrder->updates;
    
            if (!$allUpdatesOrders) {
                throw new \Exception('UPDATES_ORDER_NOT_FOUND', 404);
            }
    
            return $this->successResponse('UPDATES_ORDER_DETAILS_RETRIEVED', [
                UpdateResource::collection($allUpdatesOrders),
            ], 200, App::getLocale());
        });

           
    }
    public function getFinancialDataOfOperatingOrder(Request $request)
    {       
        return $this->handleRequest(function () use ($request) {
            $id = $request->route('id');
            $this->checkForGettingId($id);
    
            $operatingOrder = $this->getOperatingOrderWithRelations($id);
            $financialData = $operatingOrder->getFinancialData($this->paymentRepository, $id);
    
            return $this->successResponse('FINANCIA_GET_SUCCESSFULLY', $financialData, 200, App::getLocale());
        });

    }
    public function getInvoiceOfOrder(Request $request  , $id)  
    {   
        return $this->handleRequest(function () use ($request, $id) {
            $id = $request->route('id');
            $this->checkForGettingId($id);
    
            $operatingOrder = $this->getOperatingOrderWithRelations($id);
            $allInvoicesOrders = $operatingOrder->invoice;
    
            if (!$allInvoicesOrders) {
                throw new \Exception('INVOICES_ORDER_NOT_FOUND', 404);
            }
    
            return $this->successResponse('INVOICES_ORDER_DETAILS_RETRIEVED', [
                InvoiceResource::collection($allInvoicesOrders),
            ], 200, App::getLocale());
        });
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
    public function updateOperatingOrderStatus(Request $request  , $id)
    {  
        try {   
            $id = $request->route('id'); 
            $update_element =   $request->input('updateElement')  ;
            if(!$request->input('updateElement')  || !$request->input('status'))
            {
                throw new \Exception('UPDATE_ELEMENT_NOT_FOUND', 404)  ; 
            }
        
            $this->checkForGettingId($id);
            $operatingOrder = $this->getOperatingOrderWithRelations($id);

            
        } catch (\Exception $e) 
        {
             if($e->getMessage() == "ORDER_NOT_FOUND")
             {
                return $this->errorResponse($e->getMessage(),[] ,  $e->getCode(), App::getLocale());

             }else if ($e->getMessage() ==  "UPDATE_ELEMENT_NOT_FOUND") 
             {
               return  $this->errorResponse('UPDATE_ELEMENT_NOT_FOUND' , [], 400, App::getLocale()); 
             }   
             else 
             {
                return $this->errorResponse($e->getMessage(), [] , $e->getCode(), App::getLocale());

             }
        }

         
 
         try
         {
             $updateSuccess = $operatingOrder->updateStatus($update_element, $request->input('status'));
            if ($updateSuccess)
             {
                     return $this->successResponse('ORDER_STATUS_UPDATED', [
                        'updated_status' => $request->input('status'),
                        'operating_order_id' => $id,
                    ], 200, App::getLocale());
             } else 
             {
                return $this->errorResponse('UPDATE_FAILED', [],  500, App::getLocale());
             }       
         } catch (\InvalidArgumentException $e) 
         {
            return $this->errorResponse('INVALID_UPDATE_ELEMENT',[] ,  400, App::getLocale());
         }
    
       

    }

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
     
    private function getOperatingOrderWithRelations($id)
    {   
        
            $operatingOrder = Cache::remember('operatingOrder_' . $id, 60, function () use ($id) 
            {
            return OperatingOrder::findWithRelations($id);
            });
             if (!$operatingOrder) {
                throw new \Exception('ORDER_NOT_FOUND', 404);
            }
            return $operatingOrder;
    }
        

    private function checkForGettingId($id) 
    {   
         if(!$id)
        {
            throw new \Exception('ID_NOT_FOUND', 404);
        }
    }
  
 
  
 
 

    }
