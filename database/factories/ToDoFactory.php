<?php

namespace Database\Factories;

use App\Models\ToDo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ToDoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ToDo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'state' => $this->faker->randomElement(['no completed', 'completed']),
            'start' => now(),
            'end' => $this->faker->dateTime('02/10/2021'),
            'to_do_list_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
