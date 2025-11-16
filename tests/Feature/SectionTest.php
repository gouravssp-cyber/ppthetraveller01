<?php

namespace Tests\Feature;

use App\Models\Section;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_the_landing_page_with_sections()
    {
        // Create sections
        $sections = Section::factory()->count(3)->create();
        
        // Create products
        $products = Product::factory()->count(10)->create();
        
        // Associate products with sections
        foreach ($sections as $section) {
            $section->products()->attach($products->random(5));
        }
        
        // Visit the landing page
        $response = $this->get('/');
        
        // Assert the page loads successfully
        $response->assertStatus(200);
        
        // Assert sections are displayed
        foreach ($sections as $section) {
            $response->assertSee($section->section_name);
        }
    }
    
    /** @test */
    public function it_can_display_individual_sections()
    {
        // Create a section
        $section = Section::factory()->create([
            'section_name' => 'Test Section',
            'section_type' => 'grid'
        ]);
        
        // Create products
        $products = Product::factory()->count(5)->create();
        
        // Associate products with section
        $section->products()->attach($products);
        
        // Visit the section page
        $response = $this->get(route('section.show', strtolower(str_replace(' ', '-', $section->section_name))));
        
        // Assert the page loads successfully
        $response->assertStatus(200);
        
        // Assert section name is displayed
        $response->assertSee($section->section_name);
        
        // Assert products are displayed
        foreach ($products as $product) {
            $response->assertSee($product->product_name);
        }
    }
    
    /** @test */
    public function it_can_search_for_products()
    {
        // Create products
        $products = Product::factory()->count(5)->create();
        
        // Search for a product
        $response = $this->get(route('search', ['query' => $products->first()->product_name]));
        
        // Assert the page loads successfully
        $response->assertStatus(200);
        
        // Assert search results are displayed
        $response->assertSee('Search Results');
        $response->assertSee($products->first()->product_name);
    }
}