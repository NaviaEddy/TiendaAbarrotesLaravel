<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    static $productos = ['Arroz', 'Carne', 'Vino', 'Leche', 'Pan', 'Queso', 'Jugo', 'Café', 'Té', 'Azúcar'];
    static $codigo = 1000;

    $nombre = array_shift($productos); 
    $codigo++;

    return [
        'nombre' => $nombre,
        'lote' => $this->faker->randomNumber(),
        'precio' => $this->faker->randomFloat(2, 1, 100),
        'stock' => $this->faker->randomNumber(),
        'fecha_fabricacion' => $this->faker->date(),
        'fecha_vencimiento' => $this->faker->date(),
        'descripcion' => $this->faker->sentence,
        'codigo' => $codigo,
        'imagen' => $this->faker->imageUrl(),
    ];
}

    }

