<?php

namespace Tests\Unit;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function get_valid_role_name()
    {
    	$admin = create(User::class,  ['role_id' => config('roles.admin')]);
    	$super = create(User::class,  ['role_id' => config('roles.super')]);
    	$basic = create(User::class,  ['role_id' => config('roles.basic')]);

        $this->assertEquals(Role::ADMIN_TEXT, $admin->getRoleName());
        $this->assertEquals(Role::SUPERUSER_TEXT, $super->getRoleName());
        $this->assertEquals(Role::BASICUSER_TEXT, $basic->getRoleName());
    }
}
