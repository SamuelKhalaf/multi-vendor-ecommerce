<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductTranslation>
 */
class ProductTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::factory(), // Create a product or use an existing one
            'locale' => $this->faker->randomElement(['en', 'ar']), // Ensure unique locales
            'name' => $this->faker->words(3, true), // Generate a 3-word name
            'description' => $this->faker->paragraphs(3, true), // Generate a 3-paragraph description
            'short_description' => $this->faker->sentence, // Generate a short sentence
        ];
    }
}
