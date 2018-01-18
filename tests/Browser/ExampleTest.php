<?php

namespace Tests\Browser;

use App\Admin;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Events\AdminLoggedin;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Happiness');
        });
    }
    /** @test */
    function it_fakes_events()
    {
        Event::fake();
        //auth()->loginUsingId(11);
        // $user = Admin::find(3);
        // $this->browse(function ($browser) use ($user) {
        //     $browser->visit('/adm/login')
        //             ->type('name', $user->name)
        //             ->type('password', 'secret')
        //             ->press('Login')
        //             ->assertPathIs('/admin');
        // });
        Event::assertNotDispatched(AdminLoggedin::class);
    }
}
