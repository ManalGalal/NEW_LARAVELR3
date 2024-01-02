<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
           
            'cat_name' =>fake()->name(),
           // 'cat_name' => $this->faker->word, // Adjust according to your requirements
        ];
    }
}
