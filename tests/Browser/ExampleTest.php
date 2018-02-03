<?php

namespace Tests\Browser;

use App\User;
use App\Admin;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Events\AdminLoggedin;
use Tests\Browser\Pages\HomePage;
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
            $name = $browser->visit('/')
                    //->text('.mbr-section-title');
                    ->assertSee('Happiness');
                    //dd($name);
        });
    }
    /** @test */
    function it_visit_welcome_page()
    {
        $this->browse(function (Browser $browser) {
                $browser->visit(new HomePage)
                    ->assert();
        });
    }
    /** @test */
    function it_login_user()
    {
        $user = User::find(12);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/auth/login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertSee('Under Construction')
                    ->assertPathIs('/home');
        });
    }

    /** @test */
    // function it_fakes_events()
    // {
    //     Event::fake();
    //     $admin = Admin::find(3);
    //     $this->browse(function ($browser) use ($admin) {
    //         $browser->visit('/adm/login')
    //                 ->type('name', $admin->name)
    //                 ->type('password', 'xxxxxx')
    //                 ->press('Login')
    //                 ->assertPathIs('/admin');
    //     });
    //     //Event::assertDispatched(AdminLoggedin::class);
    // }
}
