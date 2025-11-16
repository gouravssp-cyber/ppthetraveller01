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
                'section_name' => 'Men\'s Shirts',
                'section_type' => 'grid',
                'description' => 'All men\'s shirt products',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'section_name' => 'Women\'s Shirts',
                'section_type' => 'grid',
                'description' => 'All women\'s shirt products',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'section_name' => 'Shirts',
                'section_type' => 'carousel',
                'description' => 'Featured shirts carousel',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'section_name' => 'Men\'s Casual',
                'section_type' => 'grid',
                'description' => 'Casual wear for men',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'section_name' => 'Featured Banner',
                'section_type' => 'banner',
                'description' => 'Featured products banner section',
                'display_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
