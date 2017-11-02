<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventDashboardTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    function admins_can_visit_the_admin_dashboard_events()
    {
    	$admin = factory(User::class)->create([
    		'admin' => true
    	]);

    	$this->actingAs($admin)
    		 ->get(route('admin_events'))
    		 ->assertStatus(200)
    		 ->AssertSee('Admin Events');
    }

    /** @test */
    function non_admin_users_cannot_visit_the_admin_dashboard_events()
    {
    	$user = factory(User::class)->create([
    		'admin' => false
    	]);

    	$this->actingAs($user)
    		 ->get(route('admin_events'))
    		 ->assertStatus(403);
    	
    }

    /** @test */
    function guests_cannot_visit_the_admin_dashboard_events()
    {
    	$this->get(route('admin_events'))
    		 ->assertRedirect('login');
    	
    } 
}