<?php

namespace Tests\Unit;

use App\User;
use App\Admin;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /** @test */
    public function fake_authentificate_user()
    {
        $this->assertGuest();
        $user = factory(User::class)->make(['email' => 'test@usa.com', 'password' => 'secret']);
        $response = $this->actingAs($user)->withSession(['foo' => 'bar'])->get('/');
        $response->assertSessionHas('foo', 'bar');
        $this->assertAuthenticated();
        $this->assertAuthenticatedAs($user);
        $this->assertInvalidCredentials(['email' => 'hettinge@example.com', 'password' => 'secret2']);
    }
    /** @test */
    public function real_authentificate_user()
    {
        $this->assertGuest();
        //$user = factory(User::class)->create();
        $user = User::find(1);//12
        $response = $this->actingAs($user)->withSession(['foo' => 'bar'])->get('/');
        $response->assertSessionHas('foo', 'bar');
        $this->assertAuthenticated();
        $this->assertAuthenticatedAs($user);
        $this->assertCredentials(['email' => $user->email, 'password' => 'secret']);
        $this->assertInvalidCredentials(['email' => 'hettinge@example.com', 'password' => 'secret2']);
    }
    /** @test */
    public function authentificate_admin()
    {
        $this->assertGuest();
        $admin = Admin::find(4);
        $response = $this->actingAs($admin)->withSession(['faz' => 'baz'])->get('/admin');
        $response->assertSessionHas('faz', 'baz');
        $this->assertAuthenticated();
        $this->assertAuthenticatedAs($admin);
        $this->assertInvalidCredentials(['name' => $admin->name, 'password' => 'secret2']);
    }
}
