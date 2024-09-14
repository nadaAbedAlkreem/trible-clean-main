<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Representative;
use App\Repositories\IRepresentativeRepository;
use App\Http\Requests\StoreRepresentativeRequest;
use App\Http\Requests\UpdateRepresentativeRequest;

class RepresentativeController extends Controller
{


    private $representativeRepository ;

    public function __construct(IRepresentativeRepository $representativeRepository   ){

        $this->representativeRepository = $representativeRepository;
        
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
     * @param  \App\Http\Requests\StoreRepresentativeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRepresentativeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function show(Representative $representative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function edit(Representative $representative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepresentativeRequest  $request
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepresentativeRequest $request, Representative $representative)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Representative $representative)
    {
        //
    }
}
