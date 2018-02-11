<?php

use App\Models\Post;
use App\Models\User;

$factory->define(Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->text,
        'published' => config('post.review'),
        'user_id' => factory(User::class)->create()->id
    ];
});