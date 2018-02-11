<?php

use Illuminate\Database\Seeder;

use App\Models\Post;
use Faker\Factory as Faker;

class MockPostSeeder extends Seeder
{
    private $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Mock Admin Post
        $this->mockPost(5, 1, config('post.published'));

        //Mock Super User Post
        $this->mockPost(4, 2, config('post.published'));

        //Mock Basic User Post
        $this->mockPost(3, 3, config('post.review'));
    }

    private function mockPost($amount, $userId, $published)
    {
        for($i = 1; $i <= $amount; $i++){
            $post = factory(Post::class)->make();
            $post->user_id = $userId;
            $post->published = $published;
            $post->created_at = $this->faker->dateTimeBetween(
                $startDate = '-5 years', 
                $endDate = 'now', 
                $timezone = date_default_timezone_get()
            );

            $post->save();

            $post->addTags([
                $this->faker->country, 
                $this->faker->country
            ]);
        }
    }
}
