<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Update;
use App\Http\Requests\StoreUpdateRequest;
use App\Http\Requests\UpdateUpdateRequest;
use App\Repositories\IUpdateRepository;

class UpdateController extends Controller
{

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
            $this->updateRepository->create($request->getDataWithImage());
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
