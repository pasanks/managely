<?php

namespace Tests\Feature\Task;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CreateProjectTaskTest extends TestCase
{
    use RefreshDatabase;

    public function testAddTaskToProject()
    {
        $this->signIn();

        $project = Project::factory()->create(['user_id'=> Auth::user()->id ]);

        $task = Task::factory()->make(['user_id'=> Auth::user()->id, 'project_id'=>$project->id]);

        $this->post($project->path() . '/tasks', $task->toArray());

        $this->get($project->path())->assertSee($task->body);
    }

    public function testTaskRequiresBody()
    {
        $this->signIn();

        $project = Project::factory()->create(['user_id'=> Auth::user()->id ]);

        $task = Task::factory()->make(['body'=> null, 'project_id'=>$project->id]);

        $this->post($project->path() . '/tasks', $task->toArray())
            ->assertSessionHasErrors('body');
    }

    public function testTaskRequiresProject()
    {
        $this->signIn();

        $project = Project::factory()->create(['user_id'=> Auth::user()->id ]);

        $task = Task::factory()->make(['project_id' => null]);

        $this->post($project->path() . '/tasks', $task->toArray())
            ->assertSessionHasErrors('project_id');
    }

//    public function testOnlyTheOwnerOfTheProjectCanAddTask()
//    {
//        $this->signIn();
//
//        $project = Project::factory()->create(['user_id'=> Auth::user()->id ]);
//
//        $task = Task::factory()->make(['project_id'=>$project->id]);
//
//        $this->post($project->path().'/tasks',$task->toArray())
//        ->assertStatus(403);
//    }
}
