<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DbTest extends TestCase
{
    /** @test */
    function check_user_has_email()
    {
        // $this->assertDatabaseHas('users', [
        //     'email' => 'holden.bergnaum@example.com'
        // ]);
    }
}
