<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\TagTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->unique()->slug, // Generate a unique slug
        ];
    }

    /**
     * Configure the factory to create translations after creating a tag.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Tag $tag) {
            // Create translations for the tag in specific locales
            $locales = ['en', 'ar']; // Define the locales you want
            foreach ($locales as $locale) {
                TagTranslation::factory()->create([
                    'tag_id' => $tag->id,
                    'locale' => $locale,
                ]);
            }
        });
    }
}
