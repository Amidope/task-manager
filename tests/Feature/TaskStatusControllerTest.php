<?php

namespace Tests\Feature;

use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function database_path;

class TaskStatusControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private TaskStatus $taskStatus;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->taskStatus = TaskStatus::factory()->create();
    }

    public function testIndex(): void
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();

        $statuses = include(database_path("default_task_statuses.php"));
        foreach ($statuses as $status) {
            $response->assertSee($status);
        }
    }

    public function testCreate(): void
    {
        $response = $this->actingAs($this->user)->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testEdit(): void
    {
        $response = $this->actingAs($this->user)->get(route('task_statuses.edit', $this->taskStatus));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = $this->taskStatus->only('name');
        $response = $this->actingAs($this->user)->post(route('task_statuses.store', $data));
        $response->assertSessionHasNoErrors();
    }

    public function testUpdate(): void
    {
        $data = $this->taskStatus->only('name');
        $response = $this->actingAs($this->user)->patch(route('task_statuses.update', $this->taskStatus), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testDelete(): void
    {
        $response = $this->actingAs($this->user)->delete(route('task_statuses.destroy', $this->taskStatus));
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('task_statuses', ['id' => $this->taskStatus['id']]);
    }
}
