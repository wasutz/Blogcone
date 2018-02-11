<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ParticipatePostTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_has_status_published_when_admin_review_the_post()
    {
        $post = $this->createUnpublishedPost();

        $this->get('/')->assertDontSee($post->title);

        $this->signInAsAdmin();

        $this->post('/posts/' . $post->id . '/review');

        $this->assertDatabaseHas('posts', [
            'title'      => $post->title,
            'published'  => config('post.published'),
        ]);
        $this->get('/')->assertSee($post->title);
    }

    /** @test */
    public function it_has_status_cancel_when_admin_cancel_the_post()
    {
        $post = $this->createUnpublishedPost();

        $this->get('/')->assertDontSee($post->title);

        $this->signInAsAdmin();

        $this->post('/posts/' . $post->id . '/cancel');

        $this->assertDatabaseHas('posts', [
            'title'      => $post->title,
            'published'  => config('post.cancel'),
        ]);
        $this->get('/')->assertDontSee($post->title);
    }

    private function createUnpublishedPost()
    {
        $basicUser = create(User::class, ['role_id' => config('roles.basic')]);

        $this->signIn($basicUser);

        $post = make(Post::class);
        $this->post('/posts', $post->toArray());

        return Post::latest()->first();
    }

}
