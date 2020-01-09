<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    // use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/posts/');
        $response->assertStatus(200);
        $response->assertSee('All Posts:');
    }

    public function testPost()
    {
        $this->assertDatabaseHas('posts', [
            'content' => "攝影棚內拿紙拭淚 柯文哲哭了"
        ]);
    }

    public function testAllPost()
    {
        $text = "攝影棚內拿紙拭淚 柯文哲哭了";
        $this->get("/posts/insert?content=$text");

        $response = $this->get('/posts/');
        $response->assertStatus(200);
        $response->assertSee('All Posts:');
        $response->assertSee('攝影棚內拿紙拭淚 柯文哲哭了');
    }

    public function testGetPost()
    {
        $text = "do you want to build a snowman?";
        $this->get("/posts/insert?content=$text");

        $response = $this->get('/posts/');
        $response->assertSee($text);
    }

    public function testPostPosts()
    {
        $text = "Let it go, let it go";

        $this->post('/posts', ['content' => $text]);
        $this->assertDatabaseHas('posts', ['content' => $text]);

        $response = $this->get('/posts/');
        $response->assertSee($text);
    }
}
