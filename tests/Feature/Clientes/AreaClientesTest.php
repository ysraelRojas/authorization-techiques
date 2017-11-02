<?php

namespace Tests\Feature\Clientes;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AreaClientesTest extends TestCase
{
    /** @test */
   	function un_usuario_tipo_cliente_solo_puede_ingresar_al_area_clientes()
   	{
   		$cliente = factory(User::class)->create([
   			'cliente' => true
   		]);

   		$this->actingAs($cliente)
   			 ->get(route('area_clientes'))
   			 ->assertStatus(200)
   			 ->assertSee('Panel Clientes');
   	}

   	/** @test */
   	function un_usuario_tipo_no_cliente_no_puede_ingresar_al_area_clientes()
   	{
   		$user = factory(User::class)->create([
   			'cliente' => false
   		]);

   		$this->actingAs($user)
   			 ->get(route('area_clientes'))
   			 ->assertStatus(403);
   	}

   	/** @test */
   	function un_usuario_anonimo_es_puede_ingresar_al_area_ventas()
   	{
   		$this->get(route('area_clientes'))
   			 ->assertRedirect('login');
   	}
}
