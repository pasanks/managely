<?php

namespace Tests\Feature\Task;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UpdateProjectTaskTest extends TestCase
{
    use RefreshDatabase;

    public function testUpdateTask()
    {
        $this->signIn();

        $project = Project::factory()->create(['user_id'=> Auth::user()->id ]);

        $task = Task::factory()->create(['user_id'=> Auth::user()->id, 'project_id'=>$project->id]);

        $attributes = [
            'body' => 'Changed Task'
        ];

        $this->patch($task->path(), $attributes);

        $this->assertDatabaseHas('tasks', $attributes);
    }

    public function testOnlyProjectOwnerCanUpdateTask()
    {
        $this->signIn();

        $project = Project::factory()->create(['user_id'=> Auth::user()->id ]);

        $task = Task::factory()->create(['project_id'=>$project->id]);

        $attributes = [
            'body' => 'Changed Task',
            'completed' => true,
        ];

        $this->patch($task->path(), $attributes)->assertStatus(403);
    }

    public function testUpdateTaskRequiresBody()
    {
        $this->signIn();

        $project = Project::factory()->create(['user_id'=> Auth::user()->id ]);

        $task = Task::factory()->create(['user_id'=> Auth::user()->id, 'project_id'=>$project->id]);

        $attributes = [
            'body' => null
        ];

        $this->patch($task->path(), $attributes)->assertSessionHasErrors('body');
    }
}
