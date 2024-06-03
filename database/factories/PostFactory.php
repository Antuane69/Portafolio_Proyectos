<?php

namespace Database\Factories;
namespace app\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Post;

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
            'titulo' => $this->faker->sentence(5),
            'marca' => $this->faker->sentence(5),
            'modelo' => $this->faker->sentence(5),
            'color' => $this->faker->sentence(5),
            'precio' => $this->faker->randomNumber(),
            'fallas' => $this->faker->sentence(10),
            'descripcion' => $this->faker->sentence(20),
            'imagen' => $this->faker->uuid() . 'jpg',
            'user_id' => $this->faker->randomElement([1,2,3])
        ];
    }
}

