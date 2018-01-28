<?php

namespace Tests\Browser;

use App\Category;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LinkTest extends DuskTestCase
{
    /** @test */
    public function link_index()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/links')
                    ->assertSee('Web Development Links');
        });
    }
    /** @test */
    public function php_click()
    {
        $category = Category::find(1);
        $links = $category->links()->take(1)->get();
        $this->browse(function (Browser $browser) use ($links) {
           $browser->visit('/links')
            ->clickLink('php')
            //->assertSee($links[0]->address)
            ->assertPathIs('/tags/php');
        });
    }
    /** @test */
    public function js_click()
    {
        $category = Category::find(2);
        $links = $category->links()->take(1)->get();
        $this->browse(function (Browser $browser) use ($links) {
           $browser->visit('/links')
            ->clickLink('js')
            //->assertSee($links[0]->address)
            ->assertPathIs('/tags/js');
        });
    }
}
