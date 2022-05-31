<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'address' => $this->faker->address(),
            'coordinates' => strval(rand(0,50)+(mt_rand() / mt_getrandmax())).','.strval(rand(0,50)+(mt_rand() / mt_getrandmax())),
            'phone' => $this->faker->phoneNumber(),
            'user_id' =>  User::role('restaurant-admin')->get()->pluck('id')->random()

        ];
    }
}
