<?php
namespace App\Http\Controllers\Api\V1\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Update;
use App\Http\Requests\StoreUpdateRequest;
use App\Http\Requests\UpdateUpdateRequest;
use App\Repositories\IUpdateRepository;
use App\Traits\ResponseTrait;
use App ; 
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateController extends Controller
{  
    use ResponseTrait  ; 
    private $updateRepository ;

    public function __construct(IUpdateRepository $updateRepository   ){

        $this->updateRepository = $updateRepository;
        
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
     * @param  \App\Http\Requests\StoreUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRequest $request)
    {      
         try {
            $create = $this->updateRepository->create($request->getDataWithImage());
            return $this->successResponse('CREATE_ITEM_SUCCESSFULLY',$create, 201, App::getLocale());
        } catch (\Illuminate\Validation\ValidationException $e) {
      
            return $this->errorResponse('VETIFICATION_ERRORS', ['error' => $e->errors()], 422  ,App::getLocale()); // Return validation errors
        }
    
  
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $update)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUpdateRequest  $request
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUpdateRequest $request, Update $update)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $update)
    {
        //
    }
}
