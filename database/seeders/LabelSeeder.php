<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function database_path;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $labels = include(database_path("default_labels.php"));
        foreach ($labels as $label) {
            Label::firstOrCreate($label);
        }

        Task::all()->each(function ($task) {
            $labels = Label::inRandomOrder()
                ->take(rand(1, 4))
                ->get();
            $task->labels()->attach($labels);
        });
    }
}
