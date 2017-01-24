<?php

use Illuminate\Database\Seeder;

use App\User;

class CreateUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
        	'username' => 'admin',
        	'email' => 'admin@mail.com',
        	'password' => bcrypt('password'),
        	'role_id' => config('roles.admin')
        ]);

        User::create([
            'username' => 'user1',
            'email' => 'user1@mail.com',
            'password' => bcrypt('password'),
            'role_id' => config('roles.basic')
        ]);

        User::create([
            'username' => 'superuser1',
            'email' => 'superuser1@mail.com',
            'password' => bcrypt('password'),
            'role_id' => config('roles.super')
        ]);
    }
}
