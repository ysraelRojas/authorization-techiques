<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    function a_user_cannot_be_an_admin()
    {
    	$user = factory(User::class)->create();

    	$user->refresh();

    	$this->assertFalse($user->isAdmin());
    }

}
