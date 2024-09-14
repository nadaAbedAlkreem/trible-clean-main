<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collectors')->insert([
            'name' => 'Default Collector',
                'phone_number' => '1234567890',
                'email' => 'johndoe@example.com',
                'address' => '123 Main Street',
                'created_at' => now(),
                'updated_at' => now(),       
             ]);

        // Add more collectors if needed
        DB::table('collectors')->insert([
            'name' => 'Jane Smith',
            'phone_number' => '0987654321',
            'email' => 'janesmith@example.com',
            'address' => '456 Elm Street',
            'created_at' => now(),
            'updated_at' => now(),            // Add other necessary fields
        ]);
    }
}
