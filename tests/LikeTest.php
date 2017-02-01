<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Post;

class LikeTest extends TestCase
{
    public function testLike()
    {
        $post = Post::find(1);

        $post->likes()->create([
            'user_id' => 1,
        ]);

        $this->assertEquals(1, Post::find(1)->likes()->count());
    }
}
