<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Contracts\Services\ImagesServiceContract;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imagesService = app(ImagesServiceContract::class);

        return [
            'path' => $imagesService->saveFile($this->faker->image()),
        ];
    }
}
