<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ItemOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('order_items')->insert([
            [
                'operating_order_id' => 1, // Assuming order with ID 1 exists
                'item_id' => 1, // Assuming item with ID 1 exists
                'description_ar' => 'طلبية قلم',
                'description_en' => 'Order for Pen',
                'total_quantity' => 100,
                'delivered_quantity' => 50,
                'unit_price' => 5.00,
                'total_price_before_tax' => 500.00,
                'tax' => 25.00,
                'total_price_after_tax' => 525.00,
                'vat' => 26.25,
                'total_price_after_vat' => 551.25,
                'expenses' => 10.00,
                'status' => 'not_delivered',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'operation_order_id' => 2, // Assuming order with ID 2 exists
                'item_id' => 2, // Assuming item with ID 2 exists
                'description_ar' => 'طلبية دفتر',
                'description_en' => 'Order for Notebook',
                'total_quantity' => 50,
                'delivered_quantity' => 25,
                'unit_price' => 15.00,
                'total_price_before_tax' => 750.00,
                'tax' => 37.50,
                'total_price_after_tax' => 787.50,
                'vat' => 39.375,
                'total_price_after_vat' => 826.875,
                'expenses' => 20.00,
                'status' => 'delivered',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
