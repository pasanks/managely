<?php

namespace Tests\Unit;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->project = Project::factory()->create();
    }

    public function testProjectHasUser()
    {
        $this->assertInstanceOf(User::class, $this->project->user);
    }

    public function testProjectHasPath()
    {
        $this->assertEquals('/projects/' . $this->project->id, $this->project->path());
    }

    public function testAddTask()
    {
        Task::factory()->create(['project_id'=> $this->project->id]);

        $this->assertCount(1, $this->project->tasks);
    }
}
