<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
// API Routes



Route::group(['prefix' => '{locale}', 'middleware' => 'setlocale'], function () {
    Route::namespace('Api')->group(function () {
        Route::prefix('operating-order')->group(function () {
            Route::prefix('details')->group(function () {
                Route::get('{id}', [App\Http\Controllers\Api\V1\Dashboard\OperatingOrderController::class, 'showOperatingOrderDetails'])->name('details');
                Route::get('{id}/order-items', [App\Http\Controllers\Api\V1\Dashboard\OperatingOrderController::class, 'getOrderItems'])->name('details.order.items');
                Route::get('{id}/purchases', [App\Http\Controllers\Api\V1\Dashboard\OperatingOrderController::class, 'getPurchasesOfOrderItems'])->name('details.purchase');
                Route::get('{id}/payments', [App\Http\Controllers\Api\V1\Dashboard\OperatingOrderController::class, 'getPaymentsOfOrder'])->name('details.payments');
                Route::get('{id}/attachments', [App\Http\Controllers\Api\V1\Dashboard\OperatingOrderController::class, 'getAttachmentsOfOrder'])->name('details.attachments');
                Route::get('{id}/updates', [App\Http\Controllers\Api\V1\Dashboard\OperatingOrderController::class, 'getUpdatesOfOrder'])->name('details.updates');
                Route::get('{id}/invoice', [App\Http\Controllers\Api\V1\Dashboard\OperatingOrderController::class, 'getInvoiceOfOrder'])->name('details.invoice');
                Route::get('{id}/financial', [App\Http\Controllers\Api\V1\Dashboard\OperatingOrderController::class, 'getFinancialDataOfOperatingOrder'])->name('details.financial');
                Route::get('search/collector', [App\Http\Controllers\Api\V1\Dashboard\CollectorController::class, 'getCollectorWithFormPayment'])->name('collector.search');

                Route::post('{id}/status/update', [App\Http\Controllers\Api\V1\Dashboard\OperatingOrderController::class, 'updateOperatingOrderStatus'])->name('operatingOrder.updateOperatingOrderStatus');
                Route::post('{id}/order-delivery/update', [App\Http\Controllers\Api\V1\Dashboard\ItemOrderController::class, 'updateDeliveredQuantityOfOrderItems'])->name('order.delivery.update');

                Route::post('attachment/create', [App\Http\Controllers\Api\V1\Dashboard\AttachmentController::class, 'store'])->name('attachments.create');
                Route::post('updates/create', [App\Http\Controllers\Api\V1\Dashboard\UpdateController::class, 'store'])->name('updates.create');
                Route::post('invoice/create', [App\Http\Controllers\Api\V1\Dashboard\InvoiceController::class, 'store'])->name('invoice.create');
                Route::post('payment/create', [App\Http\Controllers\Api\V1\Dashboard\PaymentController::class, 'store'])->name('payment.create');

                Route::delete('orderItems/{id}', [App\Http\Controllers\Api\V1\Dashboard\ItemOrderController::class, 'destroy'])->name('order.delete');
                Route::delete('attachment/{id}', [App\Http\Controllers\Api\V1\Dashboard\AttachmentController::class, 'destroy'])->name('attachment.delete');
                Route::delete('purchase/{id}', [App\Http\Controllers\Api\V1\Dashboard\PurchaseOrderController::class, 'destroy'])->name('purchase.delete');
                Route::delete('payment/{id}', [App\Http\Controllers\Api\V1\Dashboard\PaymentController::class, 'destroy'])->name('payment.delete');
            });
        });
    });
});
