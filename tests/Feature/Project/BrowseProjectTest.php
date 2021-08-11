<?php

namespace Tests\Feature\Project;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BrowseProjectTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testAuthenticatedUserCanViewProject()
    {
        $this->actingAs($this->user);

        $project = Project::factory()->create();

        $this->get('/projects/'. $project->id)
            ->assertSee($project->title)->assertSee($project->description);
    }
}
