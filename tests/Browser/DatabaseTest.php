<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DatabaseTest extends DuskTestCase
{
    /** @test */
    public function is_user()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'victor_traian@yahoo.com'
        ]);
    }
    /** @test */
    public function no_admin()
    {
        $this->assertDatabaseMissing('admins', [
            'name' => 'admins'
        ]);
    }
    /** @test */
    public function is_admin()
    {
        $this->assertDatabaseHas('admins', [
            'email' => 'victor_traian@yahoo.com'
        ]);
    }
}
