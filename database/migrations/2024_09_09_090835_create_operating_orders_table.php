<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operating_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->index();
            $table->foreignId('representative_id')->constrained('representatives')->index();
            $table->string('order_number');
            $table->date('order_date');// Paid and unpaid
            $table->enum('status', ['in_progress', 'completed' , 'pending'  ,'canceled']);
            $table->enum('order_importance', ['urgent' , 'regular']); //   عاج او عادي اهمية العمل 
            $table->enum('payment_status', ['paid', 'unpaid'  , 'partially-paid']);
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operating_orders');
    }
};
