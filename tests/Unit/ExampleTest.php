<?php

namespace Tests\Unit;

use App\User;
use App\Admin;
use Tests\TestCase;
use App\Events\AdminLoggedin;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /** @test */
    function it_fakes_events()
    {
        Event::fake();
        $admin = Admin::find(3);
        $this->actingAs($admin)->get('/admin');
        Event::assertNotDispatched(AdminLoggedin::class);
    }
}
