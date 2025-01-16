<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = include(database_path('default_tasks.php'));
        foreach ($tasks as $task) {
            Task::firstOrCreate([
                'name' => $task['name'],
                'description' => $task['description'],
                'status_id' => TaskStatus::inRandomOrder()->first()->id,
                'created_by_id' => User::inRandomOrder()->first()->id,
                'assigned_to_id' => User::inRandomOrder()->first()->id,
            ]);
        }
    }
}
