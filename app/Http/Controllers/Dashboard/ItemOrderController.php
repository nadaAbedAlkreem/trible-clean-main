<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemOrder;
use App\Repositories\IItemOrderRepository;
use App\Http\Requests\StoreItemOrderRequest;
use App\Http\Requests\UpdateItemOrderRequest;

class ItemOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $itemOrderRepository ;

     public function __construct(IItemOrderRepository $itemOrderRepository   ){
 
         $this->itemOrderRepository = $itemOrderRepository;
         
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
     * @param  \App\Http\Requests\StoreItemOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemOrder  $itemOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ItemOrder $itemOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemOrder  $itemOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemOrder $itemOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemOrderRequest  $request
     * @param  \App\Models\ItemOrder  $itemOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
 
        foreach ($request->items as $item) {
            if($item['delivered_quantity']  > $item['total_quantity'] )
            {
                return response()->json(['message' => 'no should delivered quantity great at total quantity '] ,500);

            }

            if($item['total_quantity'] == $item['delivered_quantity'] )
            {
                $this->itemOrderRepository->update([
                    'delivered_quantity' => $item['delivered_quantity'],
                    'status' => 'delivered'
                ], $item['id']);
                // $this->itemOrderRepository->update(['status' =>  'delivered'], $item['id']);

            }
         
            else 
            {
                $this->itemOrderRepository->update(['delivered_quantity' => $item['delivered_quantity']], $item['id']);

            }
        }
    
        return response()->json(['message' => 'Items updated successfully']);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemOrder  $itemOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $this->itemOrderRepository->Delete($id);
    }
}
