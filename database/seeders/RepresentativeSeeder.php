<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepresentativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('representatives')->insert([
            [
                'name' => 'John Doe',
                'phone_number' => '1234567890',
                'email' => 'john.doe@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'phone_number' => '0987654321',
                'email' => 'jane.smith@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Brown',
                'phone_number' => '1122334455',
                'email' => 'michael.brown@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}