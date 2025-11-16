<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sectionTypes = ['grid', 'carousel', 'banner_carousel', 'banner', 'bento'];
        
        return [
            'section_name' => $this->faker->words(3, true),
            'section_type' => $this->faker->randomElement($sectionTypes),
            'description' => $this->faker->sentence(),
            'display_order' => $this->faker->numberBetween(1, 10),
            'is_active' => $this->faker->boolean(90), // 90% chance of being active
        ];
    }
}