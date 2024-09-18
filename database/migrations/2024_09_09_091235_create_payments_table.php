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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operating_order_id')->constrained('operating_orders')->index();
            $table->foreignId('collector_id')->constrained('collectors')->index();
            $table->decimal('amount', 10, 2);
            $table->date('payment_date')->index();
            $table->string('payment_method')->index();
            $table->string('file');   
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
