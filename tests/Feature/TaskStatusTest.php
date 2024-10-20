<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\Yaml\Yaml;
use Tests\TestCase;
use function database_path;
use function dd;
use function file_get_contents;

class TaskStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_status_page_is_displayed(): void
    {
        $response = $this->get('/task_statuses');
        $response->assertStatus(200);
    }

    public function test_default_statuses_are_rendered(): void
    {
        $this->seed();
        $filepath = database_path("task_statuses.yml");
        $statuses = Yaml::parse(file_get_contents($filepath));
        $response = $this->get('/task_statuses');
        foreach ($statuses as $status) {
            $response->assertSee($status);
        }
    }
}
