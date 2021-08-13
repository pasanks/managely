<?php

namespace Tests\Feature\Project;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class BrowseProjectTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testAuthenticatedUserCanViewProjects()
    {
        $this->signIn();

        $project = Project::factory()->create(['user_id'=> Auth::user()->id]);

        $this->get('/projects/')
            ->assertSee($project->title);
    }

    public function testAuthenticatedUserCanViewOwnProject()
    {
        $this->actingAs($this->user);

        $project = Project::factory()->create(['user_id' => Auth::user()->id]);

        $this->get($project->path())
            ->assertSee($project->title)->assertSee($project->description);
    }

    public function testAuthenticatedUserCannotViewOtherUsersProject()
    {
        $this->actingAs($this->user);

        $project = Project::factory()->create();

        $this->get($project->path())->assertStatus(403);
    }

    public function testGuestUserCannotViewProjects()
    {
        $this->get('/projects/')->assertRedirect('/login');
    }

    public function testGuestUserCannotViewSingleProject()
    {
        $project = Project::factory()->create();

        $this->get($project->path())->assertRedirect('/login');
    }
}
