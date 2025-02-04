<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\BrandTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Brand>
 */
class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'is_active' => $this->faker->boolean,
        ];
    }

    /**
     * Configure the factory to create translations after creating a brand.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Brand $brand) {
            // Define the locales you want to use for translations
            $locales = ['en', 'ar']; // Example locales

            // Create translations for the brand in specific locales
            foreach ($locales as $locale) {
                BrandTranslation::factory()->create([
                    'brand_id' => $brand->id,
                    'locale' => $locale,
                ]);
            }
        });
    }
}
