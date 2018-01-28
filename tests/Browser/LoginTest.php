<?php

namespace Tests\Browser;

use App\User;
use App\Admin;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /** @test */
    public function site_index()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Happiness');
        });
    }
    /** @test */
    public function auth_to_home()
    {
        // $user = factory(User::class)->create([
        //     'email' => 'taylor@laravel.com',
        // ]);
        $user = User::find(12);
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }
    /** @test */
    public function user_auth()
    {
        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(11))
                  ->visit('/home')
                  ->assertSee('Web Development');

            $second->loginAs(User::find(12))
                   ->visit('/home')
                   ->assertSee('Web Development');
        });
    }
    /** @test */
    // public function test_auth_to_admin()
    // {
    //     $user = Admin::find(4);
    //     $this->browse(function ($browser) use ($user) {
    //         $browser->visit('/adm/login')
    //                 ->type('name', $user->name)
    //                 ->type('password', 'secret')
    //                 ->press('Login')
    //                 ->assertPathIs('/admin');
    //     });
    // }
}
