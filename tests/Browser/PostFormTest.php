<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostFormTest extends DuskTestCase
{
    public function testIfAuth()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/posts/form')
                ->assertPathIs('/login');
        });
    }
}
