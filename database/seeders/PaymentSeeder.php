<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

 
        DB::table('payments')->insert([
            'operating_order_id' => 1, // Add appropriate operation order ID
            'collector_id' => 1,
            'amount' => 1500.00,
            'payment_date' => now(),
            'payment_method' => 'Credit Card',
            'file' => 'payment_receipt.pdf',
            'notes' => 'Payment received on time.',
        ]);    }
}
