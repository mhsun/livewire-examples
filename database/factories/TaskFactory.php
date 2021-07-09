<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'        => $this->faker->sentence,
            'is_completed' => 0
        ];
    }

    public function completed()
    {
        return $this->state([
            'is_completed' => 1
        ]);
    }

    public function forUser($user)
    {
        return $this->state([
            'user_id' => $user->id
        ]);
    }
}
