<?php

namespace Tests\Feature\Ventas;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AreaVentasTest extends TestCase
{
    /** @test */
    public function un_usuario_tipo_vendedor_solo_puede_ingresar_al_area_ventas()
    {
        $vendedor = factory(User::class)->create([
        	'ventas' => true
        ]);

        $this->actingAs($vendedor)
        	 ->get(route('area_ventas'))
        	 ->assertStatus(200)
        	 ->assertSee('Panel Ventas');
    }

    /** @test */
    public function un_usuario_tipo_no_vendedor_no_puede_ingresar_al_area_ventas()
    {
    	$user = factory(User::class)->create([
    		'ventas' => false
    	]);

    	$this->actingAs($user)
    		 ->get(route('area_ventas'))
    		 ->assertStatus(403);
    }
    
    /** @test */
    public function un_usuario_anonimo_no_puede_ingresar_al_area_ventas()
    {
    	$this->get(route('area_ventas'))
    		 ->assertRedirect('login');
    }


}
