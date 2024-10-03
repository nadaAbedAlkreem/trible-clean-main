<?php
namespace App\Http\Controllers\Api\V1\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Collector;
use App\Http\Requests\StoreCollectorRequest;
use App\Http\Requests\UpdateCollectorRequest;
use App\Repositories\ICollectorRepository;  //RepresentativeRepository
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App ; 
class CollectorController extends Controller
{
    use ResponseTrait  ; 
    private    $collectorRepository   ;   
    public function __construct(
        ICollectorRepository $collectorRepository   ,
 
        ){
    
            $this->collectorRepository = $collectorRepository;
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
    public function getCollectorWithFormPayment(Request $request)
    {
         $search = $request->input('search_value'); 
         $searchResult =  $this->collectorRepository->getWhereSerach([['name', 'like', "%{$search}%"]]); 
         return ($searchResult) ? $this->successResponse('DATA_RETRIEVED_SUCCESSFULLY', [$searchResult] , 200,  App::getLocale()) : $this->errorResponse('DATA_RETRIEVED_FAILD', [$searchResult]  , 400,  App::getLocale());            
         
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
     * @param  \App\Http\Requests\StoreCollectorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCollectorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collector  $collector
     * @return \Illuminate\Http\Response
     */
    public function show(Collector $collector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collector  $collector
     * @return \Illuminate\Http\Response
     */
    public function edit(Collector $collector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCollectorRequest  $request
     * @param  \App\Models\Collector  $collector
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollectorRequest $request, Collector $collector)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collector  $collector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collector $collector)
    {
        //
    }
}
