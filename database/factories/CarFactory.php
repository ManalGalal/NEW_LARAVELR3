<?php

namespace Database\Factories;



use App\Models\Category;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage; 
use Database\Factories\CategoryFactory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /* modified code for seeding an image */
     protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = $this->faker->image('public/assets/images', 640, 480, 'cars', false);

        return [
            'title' => $this->faker->company(),
            'description' => $this->faker->sentence(),
            'published' => $this->faker->numberBetween(0, 1),
            'image' => '/' . $image,
            'category_id' => Category::factory(),

                ];

    }
}
