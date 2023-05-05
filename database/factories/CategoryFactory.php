<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $en=$this->faker->words(3,true);
        return [
            'name'=>json_encode(['en'=>$en,'ar'=>$this->faker->words(3,true)],JSON_UNESCAPED_UNICODE),
            'sluge'=>$en,
        ];
    }
}
