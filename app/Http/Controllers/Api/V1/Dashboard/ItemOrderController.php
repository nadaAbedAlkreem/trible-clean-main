<?php
namespace App\Http\Controllers\Api\V1\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemOrder;
use App\Repositories\IItemOrderRepository;
use App\Http\Requests\StoreItemOrderRequest;
use App\Http\Requests\UpdateItemOrderRequest;
use App ; 
use App\Traits\ResponseTrait;
use App\Exceptions\ItemOrderException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ItemOrderController extends Controller
{    
    use  ResponseTrait   ; 
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
    public function updateDeliveredQuantityOfOrderItems(Request $request)
    {
        try {
            $update = false;
            foreach ($request->items as $item) {
                $updateResult = $this->itemOrderRepository->updateDeliveredQuantity($item);
                if ($updateResult) {
                    $update = true; // If any item is updated successfully
                }
            }

            return $update ? 
                $this->successResponse('ITEMS_UPDATED_SUCCESSFULLY',[], 200, App::getLocale()) : 
                $this->errorResponse('UPDATE_FAILED', [] , 400, App::getLocale());
        } catch (ItemOrderException $e) {
            return $this->errorResponse('INVALID_DELIVERED_QUANTITY', [],  400, App::getLocale());
        } catch (\Exception $e) {
            return $this->errorResponse('EXCEPTION_MESSAGE', [] ,500, App::getLocale());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemOrder  $itemOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try
      {
        $this->itemOrderRepository->Delete($id);
        return  $this->successResponse('DELETE_SUCCESS', [], 201, App::getLocale())  ; 
      }catch (ModelNotFoundException $e) 
      {
         return $this->errorResponse('DELETE_FAILED', [] ,  422, App::getLocale());
      }
    }
}
