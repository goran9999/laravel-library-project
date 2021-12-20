<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Epoch;
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'firstName'=>$this->faker->firstName(),
           'lastName'=>$this->faker->lastName(),
           'birthYear'=>$this->faker->year(),
           'epoch_id'=>$this->faker->numberBetween(1,6)
        ];
    }
}
