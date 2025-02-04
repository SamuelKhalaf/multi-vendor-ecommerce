<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $this->faker->unique(true);
        return [
            'brand_id'             => Brand::inRandomOrder()->first()->id ?? Brand::factory()->create()->id,
            'slug'                 => $this->faker->unique()->slug,
            'price'                => $this->faker->randomFloat(4, 10, 1000), // 4 decimal places
            'special_price'        => $this->faker->randomFloat(4, 5, 500), // 4 decimal places
            'special_price_type'   => $this->faker->randomElement(['fixed', 'percent']),
            'special_price_start'  => $this->faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
            'special_price_end'    => $this->faker->dateTimeBetween('+1 month', '+2 months')->format('Y-m-d'),
            'selling_price'        => $this->faker->randomFloat(4, 10, 1000), // 4 decimal places
            'sku'                  => $this->faker->unique()->ean13,
            'manage_stock'         => $this->faker->boolean,
            'qty'                  => $this->faker->numberBetween(0, 100),
            'in_stock'             => $this->faker->boolean,
            'viewed'               => $this->faker->numberBetween(0, 1000),
            'is_active'            => $this->faker->boolean,
        ];
    }

    /**
     * Configure the factory to create translations after creating a product.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            // Define the locales you want to use for translations
            $locales = ['en', 'ar']; // Example locales

            // Create translations for the product in specific locales
            foreach ($locales as $locale) {
                ProductTranslation::factory()->create([
                    'product_id' => $product->id,
                    'locale' => $locale,
                ]);
            }
        });
    }
}
