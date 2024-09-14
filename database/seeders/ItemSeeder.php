<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name_ar' => 'قلم',
                'name_en' => 'Pen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'دفتر',
                'name_en' => 'Notebook',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
