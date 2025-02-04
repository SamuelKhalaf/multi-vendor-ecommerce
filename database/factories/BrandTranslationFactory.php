<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\BrandTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BrandTranslation>
 */
class BrandTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BrandTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'brand_id' => Brand::factory(), // Create a brand or use an existing one
            'locale'   => $this->faker->randomElement(['en', 'ar']), // Example locales
            'name'     => $this->faker->company, // Generate a realistic company name
        ];
    }
}
