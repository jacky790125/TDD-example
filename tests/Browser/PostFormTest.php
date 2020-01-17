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
        factory(User::class)->create();

        $user = factory(User::class)->create([
            'email' => 'taylor@laravel.com',
        ]);

        $this->assertSame(2, $user->id);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/posts/form')
                ->type('content', "do you want to build a snowman?")
                ->press('送出貼文');
        });

        $this->assertDatabaseHas('posts', [
            'content' => "do you want to build a snowman?",
            'user_id' => $user->id
        ]);
    }

    public function testPostLinkInIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Post')
                ->assertPathIs('/post');
        });
    }
}
