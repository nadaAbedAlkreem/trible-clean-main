<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'John Doe',
                'phone_number' => '1234567890',
                'email' => 'johndoe@example.com',
                'address' => '123 Main Street',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'phone_number' => '0987654321',
                'email' => 'janesmith@example.com',
                'address' => '456 Elm Street',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
