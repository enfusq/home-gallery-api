<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $userId = 1;
        return [
            'image_path' => 'images/' . $this->faker->uuid(). '.jpg',
            'user_id' => $userId,
            'original_name' => $this->faker->word() . '.jpg',
            'datetime' => $this->faker->dateTimeThisDecade()
        ];
    }
}
