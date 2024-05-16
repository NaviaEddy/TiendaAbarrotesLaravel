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
    public function definition(): array
    {
        return [
            'name' => $name = $this->faker->word(),
            'category_id' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'stock' => $this->faker->numberBetween(1, 100),
            'code' => strtoupper(substr($name, 0, 3)) . '-' . substr(md5(uniqid($name, true)), 0, 6),
            'image' => '',
            'expiration_date' => $this->faker->date('Y-m-d', now()->addYears(2)->format('Y-m-d'))
        ];
    }
}
