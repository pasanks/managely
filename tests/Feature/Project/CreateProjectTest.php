<?php

namespace Tests\Feature\Project;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateProjectTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }
    public function testCreateProjectView()
    {
        $this->actingAs($this->user);

        $response = $this->get('projects/create');

        $response->assertStatus(200);
    }

    public function testAuthenticatedUserCreateProject()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->user);

        $project = Project::factory()->make();

        $this->post('/projects', $project->toArray())
        ->assertRedirect('/projects');

        $this->assertDatabaseHas('projects',[
            'title'=>$project->title,
            'description'=>$project->description,
        ]);

        $this->get('/projects')->assertSee($project->title);
    }



    public function testProjectRequiresTitle()
    {
        $this->actingAs($this->user);

        $project = Project::factory()->make(['title'=>null]);

        $this->post('/projects', $project->toArray())
            ->assertSessionHasErrors('title');
    }

    public function testProjectRequiresDescription()
    {
        $this->actingAs($this->user);

        $project = Project::factory()->make(['description'=>null]);

        $this->post('/projects', $project->toArray())
            ->assertSessionHasErrors('description');
    }

    public function testUnAuthenticatedUserCreateProject()
    {
        $project = Project::factory()->make();

        $this->post('/projects', $project->toArray())
            ->assertRedirect('/login');
    }
}
