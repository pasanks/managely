<?php

namespace Tests\Feature\Project;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UpdateProjectTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testUpdateProjectView()
    {
        $this->actingAs($this->user);

        $response = $this->get('projects/edit');

        $response->assertStatus(200);
    }

    public function testAuthorizedUserUpdateProject()
    {
        $this->actingAs($this->user);

        $project = Project::factory()->create(['user_id'=> Auth::user()->id ]);

        $project->title = 'Updated Project Title';

        $this->put('/projects/' . $project->id, $project->toArray());

        $this->assertDatabaseHas('projects',[
            'id'=>$project->id,
            'title'=>$project->title,
        ]);
    }

    public function testUnAuthorizedUserUpdateProject()
    {
        $project = Project::factory()->create();

        $project->title = 'Updated Project Title';

        $this->put('/projects/' . $project->id, $project->toArray())
        ->assertRedirect('/login');
    }
}
