<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' =>$this->faker->numberBetween(25,90),
            'category_id' =>$this->faker->numberBetween(1,10),
            'cantidad' =>$this->faker->numberBetween(20,90),
            'image' =>$this->faker->imageUrl($width = 640, $height = 480),
            'info' =>$this->faker->text(),
            'image_dos' => $this->faker->imageUrl($width = 640, $height = 480),
            'image_tres' => $this->faker->imageUrl($width = 640, $height = 480),
            'image_cuatro' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
