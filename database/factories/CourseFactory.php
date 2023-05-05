<?php

namespace Database\Factories;

use App\Models\payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {$en=$this->faker->words(3,true);
        $type=['payment','free'];
        return [
            'name'=>json_encode(['en'=>$en,'ar'=>$this->faker->words(3,true)],JSON_UNESCAPED_UNICODE),
            'sluge'=>$en,
            	'price'=>$this->faker->numberBetween(100,500),
            	'descount'=>$this->faker->numberBetween(10,20),
            	'internal_content'=>json_encode(['en'=>$this->faker->sentence(30,true),'ar'=>$this->faker->sentence(30,true)],JSON_UNESCAPED_UNICODE),
            	'external_content'=>json_encode(['en'=>$this->faker->sentence(20,true),'ar'=>$this->faker->sentence(20,true)],JSON_UNESCAPED_UNICODE),
            	'image'=>$this->faker->imageUrl(),
            	'type'=>$type[$this->faker->numberBetween(0,1)],
            	'category_id'=>$this->faker->numberBetween(1,5)



        ];
    }
}
