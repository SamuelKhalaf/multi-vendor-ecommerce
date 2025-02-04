<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\TagTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TagTranslation>
 */
class TagTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TagTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id' => Tag::factory(), // Create a tag or use an existing one
            'locale' => $this->faker->randomElement(['en', 'ar']), // Example locales
            'name' => $this->faker->word, // Generate a word for the tag name
        ];
    }
}
