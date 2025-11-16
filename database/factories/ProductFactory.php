<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productName = $this->faker->words(3, true);
        
        return [
            'product_id' => Str::slug($productName) . '-' . $this->faker->unique()->numberBetween(1, 10000),
            'product_name' => ucfirst($productName),
            'product_title' => $this->faker->sentence(),
            'face_image' => null,
            'category_id' => null,
            'brand' => $this->faker->company(),
            'color' => $this->faker->colorName(),
            'sizes' => $this->faker->randomElements(['XS', 'S', 'M', 'L', 'XL', 'XXL'], $this->faker->numberBetween(1, 4)),
            'min_price' => $this->faker->numberBetween(500, 2000),
            'max_price' => $this->faker->numberBetween(2000, 5000),
            'variants' => null,
            'is_active' => $this->faker->boolean(90), // 90% chance of being active
        ];
    }
}