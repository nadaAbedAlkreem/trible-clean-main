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
        Schema::create('financial_details', function (Blueprint $table) {
            $table->id();
            $table->decimal('sales', 12, 2); // Sales amount
            $table->decimal('expenses', 12, 2); // Expenses amount
            $table->decimal('profit', 12, 2); // Profit amount
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
        Schema::dropIfExists('financial_details');
    }
};
