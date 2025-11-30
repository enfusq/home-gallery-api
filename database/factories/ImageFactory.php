<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
         // Ensure directory exists
        Storage::makeDirectory('public/images');

        // Download from API (Picsum example)
        $response = Http::get('https://picsum.photos/640/480');

        // Unique filename
        $filename = Str::uuid() . '.jpg';

        // Save file to storage
        Storage::disk('public')->put("images/$filename", $response->body());

        $baseUrl = config('app.url');

        return [
            'image_path' => $baseUrl. '/storage/images/' . $filename,
            'user_id' => 1,
            'original_name' => $this->faker->word() . '.jpg',
            'taken_at' => $this->faker->dateTimeThisDecade()
        ];
    }
}
