<?php

namespace Tests\Feature\Project;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DeleteProjectTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testAuthorizedUserDeleteProject()
    {
        $this->actingAs($this->user);

        $project =  Project::factory()->create(['user_id' => Auth::id()]);

        $this->delete('/projects/'.$project->id);

        $this->assertDatabaseMissing('projects', ['id'=> $project->id]);
    }

    public function testAuthorizedUserCannotDeleterOtherUsersProjects()
    {
        $this->actingAs($this->user);

        $project =  Project::factory()->create();

        $this->delete('/projects/'.$project->id)->assertStatus(403);
    }

    public function testUnAuthorizedUserDeleteProject()
    {
        $project =  Project::factory()->create();

        $this->delete('/projects/'.$project->id)->assertRedirect('/login');
    }
}
