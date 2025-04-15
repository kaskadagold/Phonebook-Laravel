<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fields = [
            'name' => fake()->name(),
            'phone' => '7' . fake()->numerify('##########'),
        ];

        /* Случайное добавление изображений контактам */
        if (rand(0, 9) >= 4) {
            $fields['image_id'] = Image::factory();
        }

        return $fields;
    }
}
