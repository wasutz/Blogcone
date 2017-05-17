<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Post;
use App\User;

class PostTest extends TestCase
{
	use DatabaseTransactions;

    public function testCreateByAdmin()
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

    public function testCreateByBasicUser()
    {
        $post = factory(Post::class)->make();
        $user = factory(User::class)->create();

        $post->user_id = $user->id;
        $post->published = $user->getPublishedByRole();
        $post->save();

        $this->assertEquals(config('post.review'), $post->published);
    }

    public function testLikePost()
    {
    	$post = factory(Post::class)->make();
        $user = factory(User::class)->create();

        $post->user_id = $user->id;
        $post->save();

        $post->triggerLike($user);

        $this->assertEquals(1, $post->likes()->count());
    }
}
