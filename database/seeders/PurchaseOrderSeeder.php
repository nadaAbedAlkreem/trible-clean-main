<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for the `purchase_orders` table
        $purchaseOrders = [
            [
                'order_item_id' => 1, // Ensure this ID exists in your `order_items` table
                'description_ar' => 'وصف الطلب 1',
                'description_en' => 'Order description 1',
                'quantity' => 10,
                'unit_price' => 15.00,
                'total_price_before_tax' => 150.00,
                'tax' => 10.00,
                'total_price_after_tax' => 160.00, // Calculated as total_price_before_tax + tax
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'order_item_id' => 2, // Ensure this ID exists in your `order_items` table
                'description_ar' => 'وصف الطلب 2',
                'description_en' => 'Order description 2',
                'quantity' => 5,
                'unit_price' => 25.00,
                'total_price_before_tax' => 125.00,
                'tax' => 5.00,
                'total_price_after_tax' => 130.00, // Calculated as total_price_before_tax + tax
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            // Add more entries as needed
        ];
        

        // Insert data into the `purchase_orders` table
        DB::table('purchase_orders')->insert($purchaseOrders);
    }
}
