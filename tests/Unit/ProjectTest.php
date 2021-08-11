<?php

namespace Tests\Unit;

use App\Models\Project;
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
}
