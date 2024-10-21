<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;
use Symfony\Component\Yaml\Yaml;
use function database_path;
use function dd;
use function includeIfExists;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = include(database_path("default_task_statuses.php"));
        foreach ($statuses as $status) {
            TaskStatus::create(['name' => $status]);
        }
    }
}

