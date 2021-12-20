<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\User;
use Faker\Factory as Faker;
//use lib\faker\books\book;
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'name'=>$this->faker->word(),
            'pageNumber'=>$this->faker->numberBetween(40,500),
            'publishingHouse'=>$this->faker->word(),
            'circulation'=>$this->faker->numberBetween(100,5000),
            'user_id'=>User::factory(),
            'author_id'=>Author::factory(),
            'category_id'=>$this->faker->numberBetween(1,3),
            'ISBN'=>$this->faker->regexify('([1-9][1-9][1-9][1-9]-){4}')
        ];
    }
}
