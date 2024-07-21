<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class usuarioTest extends TestCase
{
    public function test_CrearUsuario()
    {
        $estructuraEsperable = [
            'id',
            'nombre',
            'apellido',
            'telefono',
            'created_at',
            'updated_at',
        ];

        $datosDeUsuario = [
            "nombre" => "Ana",
            "apellido" => "Alvez",
            "telefono" => 26006060,
        ];

        $response = $this->post('/api/usuario', $datosDeUsuario);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeUsuario);

        $this->assertDatabaseHas('usuario', [
            "nombre" => "Ana",
            "apellido" => "Alvez",
            "telefono" => 26006060,
        ]);
    }

    public function test_ModificarUsuario()
    {
        $estructuraEsperable = [
            'id',
            'nombre',
            'apellido',
            'telefono',
            'created_at',
            'updated_at',

        ];

        $datosDeUsuario = [
            "nombre" => "Juan",
            "apellido" => "Suarez",
            "telefono" => 26005050,
        ];


        $response = $this->put('/api/usuario/1', $datosDeUsuario);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeUsuario);
        $this->assertDatabaseHas('usuario', [
            "nombre" => "Juan",
            "apellido" => "Suarez",
            "telefono" => 26005050,
        ]);
    }

    public function test_ObtenerListadoDeUsuario()
    {
        $estructuraEsperable = [
            '*' => [
                'id',
                'nombre',
                'apellido',
                'telefono',
                'created_at',
                'updated_at',
            ]
        ];

        $response = $this->get('/api/usuario');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_BuscarUsuario()
    {
        $estructuraEsperable = [
            'id',
            'nombre',
            'apellido',
            'telefono',
            'created_at',
            'updated_at',
        ];

        $usuario = [
            "nombre" => "Juan",
            "apellido" => "Suarez",
            "telefono" => 26005050,
        ];

        $response = $this->get('/api/usuario/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $this->assertDatabaseHas('usuario', $usuario);
    }

    public function test_EliminarUsuario()
    {
        $response = $this->delete('/api/usuario/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'Usuario Eliminado']);

        $this->assertDatabaseMissing('usuario', [
            'id' => '1',
            'deleted_at' => null
        ]);
    }

    public function test_ModificarUsuarioQueNoExiste()
    {
        $response = $this->put('/api/usuario/100000');
        $response->assertStatus(404);
    }

    public function test_BuscarUnUsuarioQueNoExiste()
    {
        $response = $this->get('/api/usuario/100000');
        $response->assertStatus(404);
    }

    public function test_EliminarUsuarioQueNoExiste()
    {
        $response = $this->delete('/api/usuario/100000');
        $response->assertStatus(404);
    }
}
