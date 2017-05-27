<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Post;
use App\User;

class PostTest extends TestCase
{
	use DatabaseTransactions;

	/** @test */
    public function it_has_status_published_when_admin_create_a_post()
    {
    	$admin = factory(User::class)->create();
        $admin->role_id = config('roles.admin');
        $admin->save();

        $post = factory(Post::class)->make();
        $post->user_id = $admin->id;
        $post->published = $admin->getPublishedByRole();
        $post->save();

        $this->assertEquals(config('post.published'), $post->published);
    }

    /** @test */
    public function it_has_status_review_when_basic_user_create_a_post()
    {
        $post = factory(Post::class)->make();
        $user = factory(User::class)->create();

        $post->user_id = $user->id;
        $post->save();

        $this->assertEquals(config('post.review'), $post->published);
    }

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
}
