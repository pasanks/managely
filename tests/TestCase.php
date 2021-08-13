<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Helper function for sign in a user in tests
     *
     * @param null $user
     *
     * @return TestCase
     */
    public function signIn($user = null)
    {
        $user = $user ?: User::factory()->create();;

        return $this->actingAs($user);
    }
}
