<?php

namespace App\Services;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllersService;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Yajra\DataTables\DataTables;
use App\Http\Requests\Storage ;
use App ; 



class UpdatesDatatableService extends Controller
{
    public function handle( $request,$data)
    {
             return DataTables::of($data)
                    ->addIndexColumn()
               
                     ->addColumn('name', function ($data)
                      {
                    
                          return ' محمد عبد العزيز ';
                      })

                      ->addColumn('date', function ($data)
                      {
                    
                          return    $data->created_at->format('Y-m-d H:i:s') ; 
                      })   

                      ->addColumn('description', function ($data)
                      {
                    
                          return   $data->description_ar  ; 
                      })
                    
               
                    ->rawColumns([ 'name'  , 'date'  , 'description'])
                    ->make(true); 
           
    }
 
 
}