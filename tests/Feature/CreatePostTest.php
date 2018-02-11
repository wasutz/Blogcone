<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_has_status_published_when_admin_create_a_post()
    {
        $this->signInAsAdmin();

        $post = make(Post::class);
        $response = $this->post('/posts', $post->toArray());

        $this->assertDatabaseHas('posts', [
            'title'      => $post->title,
            'user_id'    => auth()->id(),
            'published'  => config('post.published'),
        ]);
        $this->get('/')->assertSee($post->title);
    }

    /** @test */
    public function it_has_status_review_when_basic_user_create_a_post()
    {
        $basicUser = create(User::class, ['role_id' => config('roles.basic')]);

        $this->signIn($basicUser);

        $post = make(Post::class);
        $response = $this->post('/posts', $post->toArray());

        $this->assertDatabaseHas('posts', [
            'title'      => $post->title,
            'user_id'    => auth()->id(),
            'published'  => config('post.review'),
        ]);
        $this->get('/')->assertDontSee($post->title);
    }
}
