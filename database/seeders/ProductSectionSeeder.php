<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all sections and products
        $sections = Section::all();
        $products = Product::where('is_active', true)->get();

        // If we don't have enough products, let's create some associations
        if ($sections->count() > 0 && $products->count() > 0) {
            // Associate products with sections
            foreach ($sections as $section) {
                // Get a random sample of products for each section
                $randomProducts = $products->random(min(20, $products->count()));
                
                // Sync products with section (this will create the pivot records)
                $section->products()->syncWithoutDetaching(
                    $randomProducts->pluck('id')->toArray()
                );
            }
        }
    }
}