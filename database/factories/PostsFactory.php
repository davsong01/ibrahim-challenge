<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BlogAdmin;
use App\Models\Posts;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => BlogAdmin::all()->random()->id,
            'id' => $this->faker->uuid,
            'content'=> $this->faker->sentence,  
            'title'=> $this->faker->word,  
        ];
    }
}
