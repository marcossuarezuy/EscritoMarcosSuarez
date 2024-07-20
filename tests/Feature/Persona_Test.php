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
            "telefono" => 26006060
        ];

        $response = $this->post('/api/post', $datosDeUsuario);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeUsuario);

        $this->assertDatabaseHas('usuario', [
            "nombre" => "Ana",
            "apellido" => "Alvez",
            "telefono" => 26006060
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
            "telefono" => 26005050
        ];


        $response = $this->put('/api/usuario/1', $datosDeUsuario);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeUsuario);
        $this->assertDatabaseHas('usuario', [
            "nombre" => "Juan",
            "apellido" => "Suarez",
            "telefono" => 26005050
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

}