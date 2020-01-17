<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class IndexTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testPostLinkInHomePage()
    {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create();

            $browser->loginAs($user)
                ->visit('/home')
                ->clickLink('Post')
                ->assertPathIs('/posts');
        });
    }
}
