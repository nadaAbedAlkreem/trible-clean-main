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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operating_order_id')->constrained('operating_orders')->index();
            $table->foreignId('item_id')->constrained('items')->index();
            $table->string('description_ar')->index();
            $table->string('description_en')->nullable()->index();
            $table->integer('total_quantity');
            $table->integer('delivered_quantity');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('total_price_before_tax', 10, 2);
            $table->decimal('tax', 5, 2)->default(0); 
            $table->decimal('total_price_after_tax', 10, 2);
            $table->decimal('vat', 5, 2)->nullable();
            $table->decimal('total_price_after_vat', 10, 2);
            $table->decimal('expenses', 12, 2)->nullable(); ///في حال مستوى طلبية ككل نحذفها 
            $table->enum('status', ['delivered','partially_delivered', 'not_delivered'])->index();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('item_orders');
    }
};
