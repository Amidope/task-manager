<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;

use function database_path;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = include(database_path("default_task_statuses.php"));
        foreach ($statuses as $status) {
            TaskStatus::firstOrCreate(['name' => $status]);
        }
    }
}
