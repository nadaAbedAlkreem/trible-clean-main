<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => "test" , 
            'title' =>    fake()->name(), 
            'price' =>  fake()->randomFloat(2, 10, 1000)  , 
            'discount'=> fake()->randomFloat(2, 10, 1000) , 
            'description'=> fake()->word() , 
            'count'=> fake()->randomFloat(2, 10, 1000) , 
            'is_sale'=> 0  , 
            'type'=> 'NEW'  , 
            'status'=> 'ACTIVE' , 
            'user_id' => 1,
            'category_id' => 1   , 
         ];
    }
}
