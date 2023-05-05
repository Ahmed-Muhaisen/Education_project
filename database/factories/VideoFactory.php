<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {$en=$this->faker->words(3,true);
$path=['https://www.youtube.com/watch?v=mNvJipMTKSMZ',
'https://www.youtube.com/watch?v=wJKgqYj4mtUZp=iAQB',
'https://www.youtube.com/watch?v=vtHwpyk5v08Z',
'https://www.youtube.com/watch?v=mY8yxPP9_AE',
'https://www.youtube.com/watch?v=r-msBvRW56gZ',
'https://www.youtube.com/watch?v=XN2nusxpvPEZ',
'https://www.youtube.com/watch?v=XN2nusxpvPEZ',
'https://www.youtube.com/watch?v=kilmBWdI0NEZpp=iAQB',
'https://www.youtube.com/watch?v=EDhPw1OI-KYZ',
'https://www.youtube.com/watch?v=SNJFgGXmmRQZ',
'https://www.youtube.com/watch?v=x-NRDz7RvtUZB',
'https://www.youtube.com/watch?v=YECkwn988-QZB',
 'https://www.youtube.com/watch?v=cUehdvQTH6cZB',
 'https://www.youtube.com/watch?v=ZRRCM0HvIn4ZB',
 'https://www.youtube.com/watch?v=BnTI67QhuuUZB',
 'https://www.youtube.com/watch?v=WSf_V9s_Cf4ZB',
'https://www.youtube.com/watch?v=tFkMZFSruhIZB',
'https://www.youtube.com/watch?v=b8EO1O6XDKMZB',
'https://www.youtube.com/watch?v=izzJtoZnbHYZB',
'https://www.youtube.com/watch?v=UJ-MVRviD28ZB'];


        return [
                'name'=>json_encode(['en'=>$en,'ar'=>$this->faker->words(3,true)],JSON_UNESCAPED_UNICODE),
                'time'=>$this->faker->dateTime(),
                'path'=>$path[$this->faker->numberBetween(0,19)],
                'image'=>$this->faker->imageUrl(),
                'course_id'=>$this->faker->numberBetween(1,5),
        ];
    }
}
