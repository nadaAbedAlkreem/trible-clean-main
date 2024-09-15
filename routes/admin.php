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

    Route::get('/details',[App\Http\Controllers\Dashboard\OperatingOrderController::class,'show'] )->name('details');
    Route::post('attachment/create',[App\Http\Controllers\Dashboard\AttachmentController::class,'store'] )->name('attachment.create');
    Route::post('updates/create',[App\Http\Controllers\Dashboard\UpdateController::class,'store'] )->name('updates.create');
    Route::post('invoice/create',[App\Http\Controllers\Dashboard\InvoiceController::class,'store'] )->name('invoice.create');
    Route::post('payment/create',[App\Http\Controllers\Dashboard\PaymentController::class,'store'] )->name('payment.create');
    Route::post('order/delivery/update',[App\Http\Controllers\Dashboard\ItemOrderController::class,'update'] )->name('order.update');
    Route::delete('orderItems/{id}',[App\Http\Controllers\Dashboard\ItemOrderController::class,'destroy'] )->name('order.delete');
    Route::delete('attachment/{id}',[App\Http\Controllers\Dashboard\AttachmentController::class,'destroy'] )->name('attachment.delete');
    Route::delete('purchase/{id}',[App\Http\Controllers\Dashboard\PurchaseOrderController::class,'destroy'] )->name('purchase.delete');
    Route::delete('payment/{id}',[App\Http\Controllers\Dashboard\PaymentController::class,'destroy'] )->name('payment.delete');
    Route::post('operatingOrder/update',[App\Http\Controllers\Dashboard\OperatingOrderController::class,'update'] )->name('operatingOrder.update');
    Route::get('/collector', [App\Http\Controllers\Dashboard\CollectorController::class, 'getCollector'])->name('collector.get');

//payment  
//attachment

/*------------ end Of Operating orders ----------*/
