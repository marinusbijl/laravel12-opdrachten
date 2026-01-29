<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Project;
use App\Models\Activity;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task' => $this->faker->realTextBetween(10, 200),
            'begindate' => Carbon::now(),
            'enddate' => Carbon::now()->addDays(10),
            'user_id' => User::all()->random()->id,
            'project_id' => Project::all()->random()->id,
            'activity_id' => Activity::all()->random()->id,
        ];
    }
}
