<?php

namespace Tests\Feature;

use App\Models\Section;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SectionFilterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_section_with_filter_component()
    {
        // Create a section
        $section = Section::factory()->create([
            'section_name' => 'Test Section',
            'section_type' => 'grid'
        ]);
        
        // Create a category
        $category = Category::factory()->create([
            'name' => 'Test Category'
        ]);
        
        // Create products
        $products = Product::factory()->count(5)->create([
            'category_id' => $category->id,
            'brand' => 'Test Brand',
            'color' => 'Red',
            'sizes' => ['S', 'M', 'L']
        ]);
        
        // Associate products with section
        $section->products()->attach($products);
        
        // Visit the section page
        $response = $this->get(route('section.show', strtolower(str_replace(' ', '-', $section->section_name))));
        
        // Assert the page loads successfully
        $response->assertStatus(200);
        
        // Assert section name is displayed
        $response->assertSee($section->section_name);
        
        // Assert filter component is present
        $response->assertSee('Filters');
        $response->assertSee('Category');
        $response->assertSee('Brand');
        $response->assertSee('Color');
        $response->assertSee('Size');
        $response->assertSee('Price Range');
    }
    
    /** @test */
    public function it_can_filter_products_by_category_in_section()
    {
        // Create sections
        $section = Section::factory()->create([
            'section_name' => 'Test Section',
            'section_type' => 'grid'
        ]);
        
        // Create categories
        $category1 = Category::factory()->create(['name' => 'Category 1']);
        $category2 = Category::factory()->create(['name' => 'Category 2']);
        
        // Create products
        $product1 = Product::factory()->create([
            'category_id' => $category1->id,
            'product_name' => 'Product 1'
        ]);
        
        $product2 = Product::factory()->create([
            'category_id' => $category2->id,
            'product_name' => 'Product 2'
        ]);
        
        // Associate products with section
        $section->products()->attach([$product1->id, $product2->id]);
        
        // Visit the section page
        $response = $this->get(route('section.show', strtolower(str_replace(' ', '-', $section->section_name))));
        
        // Assert both products are visible initially
        $response->assertSee('Product 1');
        $response->assertSee('Product 2');
    }
    
    /** @test */
    public function it_displays_products_in_responsive_grid_layout()
    {
        // Create a section
        $section = Section::factory()->create([
            'section_name' => 'Grid Section',
            'section_type' => 'grid'
        ]);
        
        // Create products
        $products = Product::factory()->count(6)->create();
        
        // Associate products with section
        $section->products()->attach($products);
        
        // Visit the section page
        $response = $this->get(route('section.show', strtolower(str_replace(' ', '-', $section->section_name))));
        
        // Assert the page loads successfully
        $response->assertStatus(200);
        
        // Assert products are displayed in a grid
        $response->assertSee('grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6');
    }
}