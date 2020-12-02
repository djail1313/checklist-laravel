<?php

namespace Database\Factories;

use App\Models\Checklist;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChecklistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Checklist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $is_completed = $this->faker->boolean;
        return [
            'object_domain' => $this->faker->word,
            'object_id' => (string) $this->faker->randomNumber(),
            'task_id' => (string) $this->faker->randomNumber(),
            'due' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'urgency' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->sentence,
            'is_completed' => $is_completed,
            'completed_at' => $is_completed ? $this->faker->dateTimeBetween('-1 year', '+1 year') : null,
            'created_by' => 1,
            'last_update_by' => 1
        ];
    }
}
