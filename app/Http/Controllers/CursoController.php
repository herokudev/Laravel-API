<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/cursos",
    *     summary="Mostrar cursos",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los cursos."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */    
    public function cursos(){
        $cursos = Curso::where('activo', true)->get();        
        if ($cursos->count() > 0) {
            return response()->json($cursos);
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }
        
    }    

    public function getById(int $id)
    {
        $curso = Curso::where('id', $id)->get();
        if ($curso->count() > 0) {
            return response()->json($curso);
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }        
    }      
    
    public function nuevocurso(Request $datosPost)
    {
        $nuevoCurso = new Curso();
        $nuevoCurso->nombre = $datosPost->nombre;
        $nuevoCurso->descripcion = $datosPost->descripcion;
        $nuevoCurso->save();
        return "El curso se registro exitosamente";
    }

    public function update(Request $request, int $id)
    {
        $curso = Curso::find($id);
        if ($curso) {
            $curso->nombre = $request->nombre;
            $curso->descripcion = $request->descripcion;
            $curso->save();
            
            return "Curso modificado !! ";            
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }    
    }

    public function delete(int $id)
    {
        $curso = Curso::find($id);
        if ($curso) {
            $curso->activo = 0;
            $curso->save();
            
            return "Curso borrado !! ";          
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }    
    }    
}
