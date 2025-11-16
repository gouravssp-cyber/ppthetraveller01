<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'section_name' => 'Featured Collection',
                'section_type' => 'banner',
                'description' => 'Our most popular products',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'section_name' => 'New Arrivals',
                'section_type' => 'carousel',
                'description' => 'Latest products just for you',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'section_name' => 'Summer Essentials',
                'section_type' => 'bento',
                'description' => 'Must-have items for the summer season',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'section_name' => 'Men\'s Fashion',
                'section_type' => 'grid',
                'description' => 'Trendy clothing for men',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'section_name' => 'Women\'s Fashion',
                'section_type' => 'grid',
                'description' => 'Stylish clothing for women',
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'section_name' => 'Accessories',
                'section_type' => 'carousel',
                'description' => 'Complete your look with our accessories',
                'display_order' => 6,
                'is_active' => true,
            ],
            [
                'section_name' => 'Best Sellers',
                'section_type' => 'banner_carousel',
                'description' => 'Our customers\' favorite products',
                'display_order' => 7,
                'is_active' => true,
            ],
            [
                'section_name' => 'Footwear',
                'section_type' => 'grid',
                'description' => 'Comfortable and stylish shoes',
                'display_order' => 8,
                'is_active' => true,
            ],
            [
                'section_name' => 'Special Offers',
                'section_type' => 'bento',
                'description' => 'Limited time deals and discounts',
                'display_order' => 9,
                'is_active' => true,
            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
