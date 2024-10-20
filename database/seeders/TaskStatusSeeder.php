<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;
use Symfony\Component\Yaml\Yaml;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filepath = database_path("task_statuses.yml");
        $statuses = Yaml::parse(file_get_contents($filepath));
        foreach ($statuses as $status) {
            TaskStatus::create(['name' => $status]);
        }
    }
}
