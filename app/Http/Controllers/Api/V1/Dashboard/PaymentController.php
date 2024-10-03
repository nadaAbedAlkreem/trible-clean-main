<?php
namespace App\Http\Controllers\Api\V1\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Repositories\IPaymentRepository;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Repositories\IOperatingOrderRepository;
use App\Traits\ResponseTrait;
use App ; 
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\OperatingOrder; //ItemOrder

class PaymentController extends Controller
{ 

    use ResponseTrait  ; 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    private $paymentRepository    , $operatingOrderRepository;

    public function __construct(IPaymentRepository $paymentRepository   , IOperatingOrderRepository  $operatingOrderRepository  ){

        $this->paymentRepository = $paymentRepository;
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
     * @param  \App\Http\Requests\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
             try {
                $create = $this->paymentRepository->create($request->getDataWithImage());
                $this->handleOperatingOrderPaymentStatus($request->input('operating_order_id'));
                return $this->successResponse('CREATE_ITEM_SUCCESSFULLY',$create, 201, App::getLocale());
            } catch (\Illuminate\Validation\ValidationException $e) {
                return $this->errorResponse('VETIFICATION_ERRORS', ['error' => $e->errors()], 422  ,App::getLocale()); // Return validation errors
            }
  
  
     }


 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try
       {
           $operatingOrderPaymentId = $this->paymentRepository->getWhereFirst(['id' =>$id]); 
           $this->paymentRepository->delete($id);
           $this->handleOperatingOrderPaymentStatus($operatingOrderPaymentId->operating_order_id);
          return  $this->successResponse('DELETE_SUCCESS', [], 201, App::getLocale())  ; 
       }catch (ModelNotFoundException $e) 
       {
          return $this->errorResponse('DELETE_FAILED', [],  422, App::getLocale());
       }
    
    }
 
    private function handleOperatingOrderPaymentStatus($operatingOrderId)
    {
        $operatingOrder = OperatingOrder::getOperatingOrderWithPayments($operatingOrderId);
        $operatingOrder->updatePaymentStatus();
    }
 
}
