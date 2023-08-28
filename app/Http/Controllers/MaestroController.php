<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maestro;

class MaestroController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/maestros",
    *     summary="Mostrar maestros",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los maestros."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */    
    public function maestros(){
        $maestros = Maestro::where('activo', true)->get();        
        if ($maestros->count() > 0) {
            return response()->json($maestros);
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }        
    }    
    
    public function getById(int $id)
    {
        $maestro = Maestro::where('id', $id)->get();
        if ($maestro->count() > 0) {
            return response()->json($maestro);
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }        
    }

    public function nuevomaestro(Request $datosPost)
    {
        $nuevomaestro = new Maestro();
        $nuevomaestro->nombre = $datosPost->nombre;
        $nuevomaestro->apellido = $datosPost->apellido;
        $nuevomaestro->correo = $datosPost->correo;
        $nuevomaestro->telefono = $datosPost->telefono;
        $nuevomaestro->pais = $datosPost->pais;
        $nuevomaestro->save();
        return "El maestro se registro exitosamente";
    }
    
    public function update(Request $request, int $id)
    {
        $maestro = Maestro::find($id);
        if ($maestro) {
            $maestro->nombre = $request->nombre;
            $maestro->apellido = $request->apellido;
            $maestro->correo = $request->correo;
            $maestro->telefono = $request->telefono;
            $maestro->pais = $request->pais;
            $maestro->save();
            
            return "Maestro modificado !! ";            
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }    
    }
    
    public function delete(int $id)
    {
        $maestro = Maestro::find($id);
        if ($maestro) {
            $maestro->activo = 0;
            $maestro->save();
            
            return "Maestro borrado !! ";          
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }    
    }      
}
