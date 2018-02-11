<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostTest extends TestCase
{
	use DatabaseTransactions;

    /** @test */
    public function a_user_can_like_post()
    {
    	$post = factory(Post::class)->create();
        $user = factory(User::class)->create();

        $post->like($user);

        $this->assertEquals(true, $post->isLiked($user));
    }

    /** @test */
    public function a_user_can_unlike_post()
    {
    	$post = factory(Post::class)->create();
        $user = factory(User::class)->create();

        $post->like($user);
        $post->unlike($user);

        $this->assertEquals(false, $post->isLiked($user));
    }

    /** @test */
    public function archives_must_return_correct_array()
    {
        $first = factory(Post::class)->create([
            'published' => config('post.published'),
            'created_at' => Carbon::now()->addMonth()
        ]);

        $posts = Post::archives();
        $firstPost = $posts['0'];

        $this->assertTrue(count($posts) > 0);
        $this->assertEquals([
            'year' => $first->created_at->format('Y'),
            'month' => $first->created_at->format('F'),
            'published' => 1
        ], $firstPost);
    }
}
