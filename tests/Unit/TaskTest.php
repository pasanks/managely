<?php

namespace Tests\Unit;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->task = Task::factory()->create();
    }

    public function testTaskHasUser()
    {
        $this->assertInstanceOf(User::class, $this->task->user);
    }

    public function testTaskBelongsToProject()
    {
        $this->assertInstanceOf(Project::class, $this->task->project);
    }

    public function testTaskHasPath()
    {
        $this->assertEquals("/projects/{$this->task->project->id }/tasks/{$this->task->id}", $this->task->path());
    }
}
