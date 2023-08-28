<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlumnosCurso;

class AlumnosCursoController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/alumnoscursos",
    *     summary="Mostrar todos los alumnos con cursos",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los alumnos con cursos."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */    
    public function alumnoscursos(){
        $alumnoscursos = AlumnosCurso::all();      
        if ($alumnoscursos->count() > 0) {
            return response()->json($alumnoscursos);
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }
        
    }

    public function getById(int $id)
    {
        $alumnocursos = AlumnosCurso::where('id_alumno', $id)->get();
        if ($alumnocursos->count() > 0) {
            return response()->json($alumnocursos);
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }        
    }      
    
    public function nuevamatricula(Request $datosPost)
    {
        $nuevamatricula = new AlumnosCurso();
        $nuevamatricula->id_alumno = $datosPost->id_alumno;
        $nuevamatricula->id_curso = $datosPost->id_curso;
        $nuevamatricula->save();
        return "Nuevo matricula de curso creada exitosamente";
    }        
}
