<?php

namespace Database\Seeders;

use App\Models\Checklist;
use App\Models\Item;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Checklist::factory()->count(200)->has(
            Item::factory()->count($faker->numberBetween(1, 20)),
            'items'
        )->create();
    }
}
