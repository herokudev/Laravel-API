<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;

class AsistenciaController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/asistencias",
    *     summary="Mostrar asistencia general",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar asistencia de todos los alumnos."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */    
    public function asistencias(){
        $asistencias = Asistencia::all();      
        if ($asistencias->count() > 0) {
            return response()->json($asistencias);
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }
        
    }

    public function getById(int $id)
    {
        $asistencia = Asistencia::where('id_alumno', $id)->get();
        if ($asistencia->count() > 0) {
            return response()->json($asistencia);
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }        
    }      
    
    public function nuevoasistencia(Request $datosPost)
    {
        $nuevoasistencia = new Asistencia();
        $nuevoasistencia->fechaRegistro = $datosPost->fechaRegistro;
        $nuevoasistencia->tipoRegistro = $datosPost->tipoRegistro;
        $nuevoasistencia->id_alumno = $datosPost->id_alumno;
        $nuevoasistencia->save();
        return "Asistencia registrada exitosamente";
    }    
}
