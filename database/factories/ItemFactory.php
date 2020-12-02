<?php

namespace Database\Factories;

use App\Models\Checklist;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $is_completed = $this->faker->boolean;
        return [
            'checklist_id' => Checklist::factory(),
            'description' => $this->faker->sentence,
            'due' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'urgency' => $this->faker->numberBetween(0, 100),
            'assignee_id' => 1,
            'task_id' => (string) $this->faker->randomNumber(),
            'is_completed' => $is_completed,
            'completed_at' => $is_completed ? $this->faker->dateTimeBetween('-1 year', '+1 year') : null,
            'completed_by' => 1,
            'updated_by' => 1,
            'created_by' => 1
        ];
    }
}
