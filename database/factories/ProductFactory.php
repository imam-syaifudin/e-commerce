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
            //
            'kategori_id' => mt_rand(1,4),
            'name' => $this->faker->sentence(mt_rand(5,10)),
            'image' => 'product-images/jPxUw8WG7XJr1TMyHDPFpv9ddOneE4iuq93QYd0h.png',
            'price' => '20.000',
            'stok' => '10',
            'keterangan' => $this->faker->sentence(mt_rand(20,40))
        ];
    }
}
