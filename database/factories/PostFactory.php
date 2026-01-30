<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


use App\Models\Categorie;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'titre'=> $this->faker->sentence(),
            'content'=> $this->faker->paragraph(),
            'categorie_id'=>Categorie::factory(),
            'image' => 'images/DefaultImage.jpg',
            'created_at' => now(),
            'updated_at'=> now(),
        ];
    }
}
