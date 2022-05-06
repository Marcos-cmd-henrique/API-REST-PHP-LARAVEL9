<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
   
    public function definition()
    {
        $title = $this->faker->sentence(3);
        return [
            'title'=>$title,
            'content'=> $this->faker->paragraph()
        ];
    }
}
