<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminDashboardTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    function admins_can_visit_the_admin_dashboard()
    {
        $this->withoutExceptionHandling();

    	$this->actingAs($this->createAdmin())
    		 ->get(route('admin_dashboard'))
    		 ->assertStatus(200)
    		 ->assertSee('Admin Panel');
    }

    /** @test */
    function non_admin_users_cannot_visit_the_admin_dashboard()
    {
    	$this->actingAs($this->createUser())
    		 ->get(route('admin_dashboard'))
    		 ->assertStatus(403);
    }

    /** @test */
    function guests_cannot_visit_the_dashboard()
    {
    	$this->get(route('admin_dashboard'))
    		 ->assertRedirect('login');
    }  

}
