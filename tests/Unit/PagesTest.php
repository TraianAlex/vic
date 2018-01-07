<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PagesTest extends TestCase
{
    /** @test */
    public function landing_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Traian Alexandru');
        $response->assertDontSee('error');
        $response->assertSeeText('Hey I\'m Traian,');
        $response->assertDontSeeText('Fatal error');
    }
    /** @test */
    public function about_page()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }
    /** @test */
    public function contact_page()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }
    /** @test */
    public function services_page()
    {
        $response = $this->get('/services');
        $response->assertStatus(200);
    }
    /** @test */
    public function links_page()
    {
        $response = $this->get('/links');
        $response->assertStatus(200);
    }
    /** @test */
    public function tags_all_page()
    {
        $response = $this->get('/tags/all');
        $response->assertStatus(200);
    }
    /** @test */
    public function tags_category_page()
    {
        $response = $this->get('/tags/php');
        $response->assertStatus(200);
    }
    /** @test */
    public function demos_page()
    {
        $response = $this->get('/demos');
        $response->assertStatus(200);
    }
}
