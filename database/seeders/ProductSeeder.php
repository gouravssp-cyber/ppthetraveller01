<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // Get or create categories
        $categories = Category::all();
        if ($categories->isEmpty()) {
            $categoryNames = ['Men\'s Clothing', 'Women\'s Clothing', 'Kids Clothing', 'Accessories', 'Footwear'];
            $order = 1;
            foreach ($categoryNames as $name) {
                Category::create([
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'is_active' => true,
                    'display_order' => $order++,
                ]);
            }
            $categories = Category::all();
        }

        $brands = ['Nike', 'Adidas', 'Puma', 'Levi\'s', 'Zara', 'H&M', 'Gap', 'Uniqlo', 'Forever 21', 'Calvin Klein'];
        $colors = ['Black', 'White', 'Blue', 'Red', 'Green', 'Yellow', 'Gray', 'Navy', 'Brown', 'Pink', 'Purple', 'Orange'];
        $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        $productTypes = ['Shirt', 'T-Shirt', 'Jeans', 'Jacket', 'Hoodie', 'Sweater', 'Dress', 'Skirt', 'Shorts', 'Pants'];

        // Create 50 products
        for ($i = 0; $i < 50; $i++) {
            $productName = $faker->randomElement($productTypes) . ' ' . $faker->word();
            $minPrice = $faker->numberBetween(500, 2000);
            $maxPrice = $minPrice + $faker->numberBetween(500, 3000);
            
            $productSizes = $faker->randomElements($sizes, $faker->numberBetween(2, 5));
            $selectedColor = $faker->randomElement($colors);
            $selectedBrand = $faker->randomElement($brands);

            // Create variants
            $variants = [];
            $variantCount = $faker->numberBetween(1, 3);
            
            for ($j = 0; $j < $variantCount; $j++) {
                $variantColor = $faker->randomElement($colors);
                $variantMinPrice = $faker->numberBetween($minPrice, $maxPrice - 500);
                $variantMaxPrice = $variantMinPrice + $faker->numberBetween(300, 1000);
                
                $variants[] = [
                    'variant_name' => $variantColor,
                    'images' => [],
                    'sizes' => $faker->randomElements($sizes, $faker->numberBetween(2, 4)),
                    'discount_price' => $variantMinPrice,
                    'original_price' => $variantMaxPrice,
                    'product_details' => [
                        'material_care' => [
                            'type' => $faker->randomElement(['100% Cotton', 'Polyester Blend', '100% Polyester', 'Cotton Blend', 'Linen']),
                            'wash' => $faker->randomElement(['Machine wash', 'Hand wash', 'Dry clean only', 'Machine wash cold']),
                        ],
                        'specifications' => [
                            'sleeve_length' => $faker->randomElement(['Short Sleeves', 'Long Sleeves', 'Sleeveless']),
                            'collar' => $faker->randomElement(['Round Neck', 'V-Neck', 'Collar', 'Hood']),
                            'fit' => $faker->randomElement(['Regular Fit', 'Slim Fit', 'Loose Fit', 'Skinny Fit']),
                        ],
                    ],
                ];
            }

            Product::create([
                'product_id' => Str::slug($productName) . '-' . $i,
                'product_name' => $productName,
                'product_title' => $faker->sentence(4),
                'face_image' => null, // You can add image paths here if you have images
                'category_id' => $faker->randomElement($categories)->id,
                'brand' => $selectedBrand,
                'color' => $selectedColor,
                'sizes' => $productSizes,
                'min_price' => $minPrice,
                'max_price' => $maxPrice,
                'variants' => $variants,
                'is_active' => true,
            ]);
        }

        $this->command->info('Created 50 products with realistic clothing data!');
    }
}
