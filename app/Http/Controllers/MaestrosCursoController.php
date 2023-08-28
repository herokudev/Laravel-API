<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaestrosCurso;

class MaestrosCursoController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/maestroscursos",
    *     summary="Mostrar todos los maestros con cursos",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los maestros con cursos asignados."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */    
    public function maestroscursos(){
        $maestroscursos = MaestrosCurso::all();      
        if ($maestroscursos->count() > 0) {
            return response()->json($maestroscursos);
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }
        
    }

    public function getById(int $id)
    {
        $maestrocursos = MaestrosCurso::where('id_maestro', $id)->get();
        if ($maestrocursos->count() > 0) {
            return response()->json($maestrocursos);
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }        
    }      
    
    public function asignatura(Request $datosPost)
    {
        $asignatura = new MaestrosCurso();
        $asignatura->id_maestro = $datosPost->id_maestro;
        $asignatura->id_curso = $datosPost->id_curso;
        $asignatura->save();
        return "Nueva asignatura de curso creada exitosamente";
    }        
    
}
