<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HideAdminRoutesTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    function it_does_not_allow_guests_to_discover_admin_urls()
    {
        $this->get('admin/invalid-url')
        	 ->assertStatus(302)
        	 ->assertRedirect('login');
    }

    /** @test */
    function it_displays_404s_when_admins_visit_invalid_urls()
    {
    	$this->actingAs($this->createAdmin())
    		 ->get('admin/invalid-url')
    		 ->assertStatus(404);    		 
    }
}
