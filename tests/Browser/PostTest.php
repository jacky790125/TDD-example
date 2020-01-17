<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Post;

class PostTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testPostPage()
    {
        $this->browse(function (Browser $browser) {
            $posts = factory(Post::class, 10)->create();

            $browser->visit('/posts')
                ->assertSee('Post:')
                ->assertSee($posts[1]->user->name)
                ->assertSee($posts[1]->content);
        });
    }
}
