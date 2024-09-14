<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Repositories\IPaymentRepository;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Repositories\IOperatingOrderRepository;

class PaymentController extends Controller
{
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
        $this->paymentRepository->create($request->getDataWithImage());
        $operating_order = $this->operatingOrderRepository->findWith(
            $request->input('operating_order_id'),
            ['payments']
        );
    
        $totalAmount = $operating_order->payments->sum('amount');
        $residual = $operating_order->total_amount - $totalAmount;
    
        // Return updated values
        return response()->json([
            'total_amount' => $operating_order->total_amount,
            'total_paid' => $totalAmount,
            'residual' => $residual,
        ]);
        return response()->json();
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
         $this->paymentRepository->delete($id);
    }
}
