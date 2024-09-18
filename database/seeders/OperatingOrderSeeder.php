<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OperatingOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operating_orders')->insert([
            [
                'customer_id' => 1, // Assuming customer with ID 1 exists
                'representative_id' => 1, // Assuming customer with ID 1 exists
                'order_number' => 'ORD-0001',
                'order_date' => '2024-09-10',
                'status' => 'in_progress',
                'order_importance' => 'urgent',
                'payment_status' => 'partially-paid',
                'total_amount' => 500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 2, // Assuming customer with ID 1 exists  //representative_id
                'representative_id' => 2, // Assuming customer with ID 1 exists  //representative_id
                'order_number' => 'ORD-0002',
                'order_date' => '2024-09-10',
                'status' => 'pending',
                'order_importance' => 'regular',
                'payment_status' => 'unpaid',
                'total_amount' => 750.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

}
