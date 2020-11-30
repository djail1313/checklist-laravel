<?php

namespace Database\Factories;

use App\Models\History;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = History::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'loggable_type' => $this->faker->randomElement(['items', 'checklists']),
            'loggable_id' => $this->faker->randomNumber(),
            'action' => $this->faker->randomElement(['create', 'update', 'delete']),
            'kwuid' => $this->faker->randomNumber(['items', 'checklists']),
            'value' => $this->faker->sentence,
        ];
    }
}
