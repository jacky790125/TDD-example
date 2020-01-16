<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class PostFormTest extends DuskTestCase
{
    use DatabaseMigrations;
    public function testIfAuth()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/posts/form')
                ->assertPathIs('/login');
        });
    }

    public function testPostByFormIfAuth()
    {
        $user = factory(User::class)->create([
            'email' => 'taylor@laravel.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/posts/form')
                ->type('content', "a testing post")
                ->press('送出貼文');
        });

        $this->assertDatabaseHas('posts', [
            'content' => "a testing post"
        ]);
    }
}
