<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    function a_user_can_be_an_admin()
    {
    	$user = factory(User::class)->create([
    		'admin' => false
    	]);

    	$user->refresh();

    	$this->assertFalse($user->isAdmin());

    	$user->admin = true;
    	$user->save();

    	$this->assertTrue($user->isAdmin());
    }

}
