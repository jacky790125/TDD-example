<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
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
        $response = $this->get('/posts/');
        $response->assertStatus(200);
        $response->assertSee('All Posts:');
        $response->assertSee('攝影棚內拿紙拭淚 柯文哲哭了');
    }
}
