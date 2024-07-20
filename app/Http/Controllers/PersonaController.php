<?php

namespace App\Http\Controllers;

use App\Models\PersonaModel;
use Illuminate\Http\Request;

class PersonaController extends Controller
{

    protected $table = "usuario";

    public function Crear(Request $request)
        {
            if ($request->has("nombre") && $request->has("apellido")) {
    
                $usuario = new PersonaModel();
                $usuario->nombre = $request->post("nombre");
                $usuario->apellido = $request->post("apellido");
                $usuario->telefono = $request->post("telefono");
                $usuario->save();
                return $usuario;
            }
return response()->json(["error mesage" => "Error"]);
    }

<<<<<<< Updated upstream
=======
    public function Eliminar(Request $request, $id)
    {
        $usuario = PersonaModel::findOrFail($id);
        $usuario->delete();
        return ['mensaje' => 'Usuario Eliminado'];
    }

    public function Modificar(Request $request, $id)
    {
        $usuario = PersonaModel::findOrFail($id);
        $usuario->nombre = $request->post("nombre");
        $usuario->apellido = $request->post("apellido");
        $usuario->telefono = $request->post("telefono");
        $usuario->save();
        return $usuario;
    }
>>>>>>> Stashed changes
}
