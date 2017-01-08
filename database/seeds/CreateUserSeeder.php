<?php

use Illuminate\Database\Seeder;

use App\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'username' => 'admin',
        	'email' => 'admin@mail.com',
        	'password' => bcrypt('password'),
        	'role_id' => config('roles.admin')
        ]);
    }
}
