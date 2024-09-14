<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FinancialDetail;
use App\Repositories\IFinancialDetailRepository;
use App\Http\Requests\StoreFinancialDetailRequest;
use App\Http\Requests\UpdateFinancialDetailRequest;

class FinancialDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $financialDetailRepository ;

     public function __construct(IFinancialDetailRepository $financialDetailRepository   ){
 
         $this->financialDetailRepository = $financialDetailRepository;
         
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
     * @param  \App\Http\Requests\StoreFinancialDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFinancialDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FinancialDetail  $financialDetail
     * @return \Illuminate\Http\Response
     */
    public function show(FinancialDetail $financialDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FinancialDetail  $financialDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(FinancialDetail $financialDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFinancialDetailRequest  $request
     * @param  \App\Models\FinancialDetail  $financialDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFinancialDetailRequest $request, FinancialDetail $financialDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinancialDetail  $financialDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinancialDetail $financialDetail)
    {
        //
    }
}
