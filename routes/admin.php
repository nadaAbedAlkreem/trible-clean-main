<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*------------ start Of Auth::routes(); ----------*/
    Route::group(['middleware' => ['web'] ,  'namespace' => 'Dashboard'] , function () {
     
     
 
    });
/*------------  end Of Auth::routes(); ----------*/


 

/*------------ start Of Operating orders ----------*/
    Route::group(['middleware' => ['web' , 'auth'] ,  'namespace' => 'Dashboard'] , function () {
        

         
    });


//payment  
//attachment

/*------------ end Of Operating orders ----------*/
