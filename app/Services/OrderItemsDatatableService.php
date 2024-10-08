<?php

namespace App\Services;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Yajra\DataTables\DataTables;



class OrderItemsDatatableService extends Controller
{
    public function handle( $request,$data)
    {
             return DataTables::of($data)
                    ->addIndexColumn()
                    
                    ->filter(function ($instance) use ($request) {
                    
                       })
                     ->addColumn('action', function ($data)
                      {
                      
                            return  
                             '<td>
                              <span>
                              <svg class="svg-inline--fa fa-pen-to-square" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-to-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"></path></svg><!-- <i class="fa-solid fa-pen-to-square"></i> Font Awesome fontawesome.com -->
                              </span>
                              <button name="bstable-actions" class="deleteRecord btn btn-outline-danger btn show_confirm"    data-id="'.$data->id.'" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                  </svg> 
                                  
                                </button>
                            </td>';

                      })

                      ->addColumn('status', function ($data)
                      {
                      
                        $status = $data->status;  
                        $status_style = " "  ;

                        if($status =="delivered" )
                        { 
                          
                          $status_style = '<span class="btn btn-outline-primary" style="pointer-events: none;" >
                                        تم التسليم
                                    </span>' ;

                        }elseif ($status == "partially_delivered")  
                        {
                          $status_style = '<span class="btn btn-outline-warning" style="pointer-events: none;"  >
                          مسلم جزئي
                         </span>' ;
                         }else
                        {
                          $status_style = '<span class="btn btn-outline-danger" style="pointer-events: none;"  >
                                        غير مسلم
                         </span>' ;
                        }
                         return   $status_style  ; 

                      })     // status_tax

                      ->addColumn('status_tax', function ($data)
                      {
                         $status_tax = ($data->tax == 0)? "بدون"  : "مع"    ; 
                            return $status_tax  ; 

                      })  
                  
                   
               
                    ->rawColumns([ 'action'   ,  'status' ,'status_tax'])
                    ->make(true); 
           
    }
 
 
}