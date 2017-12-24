<?php

namespace Tests\Feature;

use App\Link;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LinkTest extends TestCase
{
    /** @test */
    public function link()
    {
        $link = Link::first();
        $this->visit('links')->see($link->address);
        $this->assertResponseOk();
    }
}
