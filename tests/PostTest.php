<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Faker\Factory as Faker;
use App\Post;
use App\User;

class PostTest extends TestCase
{
    private $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    public function testCreate()
    {
        $post = new Post;
        $admin = User::find(1);

        $title = $this->faker->sentence;
        $content = $this->faker->text;

        $post->title = $title;
        $post->content = $content;
        $post->user_id = $admin->id;
        $post->published = $admin->getPublishedByRole();
        $post->save();

        $this->assertEquals($title, $post->title);
        $this->assertEquals($content, $post->content);
        $this->assertEquals(config('post.published'), $post->published);
    }

    public function testLike()
    {
        $post = Post::find(1);
        $admin = User::find(1);

        $likeBefore = $post->likes()->count();

        $post->triggerLike($admin);

        if($likeBefore === 0) {
           $this->assertEquals(1, $post->likes()->count());
        }else{
           $this->assertEquals(0, $post->likes()->count()); 
        }
    }
}
