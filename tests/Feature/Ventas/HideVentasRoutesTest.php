<?php

namespace Tests\Feature\Ventas;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HideVentasRoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_does_not_allow_guests_to_discover_ventas_urls()
    {
    	$this->get('ventas/invalid-url')
    		 ->assertStatus(302)
    		 ->assertRedirect('login');
    }

    /** @test */
    function it_displays_404s_when_ventas_visit_invalid_urls()
    {
    	$vendedor = factory(User::class)->create(['ventas' => true]);

    	$this->actingAs($vendedor)
    		 ->get('ventas/invalid-url')
    		 ->assertStatus(404);
    }
}
