<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/alumnos",
    *     summary="Mostrar alumnos",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los alumnos."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */    
    public function alumnos(){
        $alumnos = Alumno::where('activo', true)->get();        
        if ($alumnos->count() > 0) {
            return response()->json($alumnos);
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }
        
    }  

    /**
    * @OA\Get(
    *     path="/api/alumnos/{id}",
    *     summary="Mostrar alumno por id",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar alumno segun su id"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */  
    public function getById(int $id)
    {
        $alumno = Alumno::where('id', $id)->get();
        if ($alumno->count() > 0) {
            return response()->json($alumno);
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }        
    }
    
    /**
    * @OA\Post(
    *     path="/api/alumnos/new",
    *     summary="Grabar nuevo alumno",
    *     @OA\Response(
    *         response=200,
    *         description="Grabar nuevo alumno"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */      
    public function nuevoalumno(Request $datosPost)
    {
        $nuevoalumno = new Alumno();
        $nuevoalumno->nombre = $datosPost->nombre;
        $nuevoalumno->apellido = $datosPost->apellido;
        $nuevoalumno->correo = $datosPost->correo;
        $nuevoalumno->telefono = $datosPost->telefono;
        $nuevoalumno->pais = $datosPost->pais;
        $nuevoalumno->save();
        return "El alumno se registro exitosamente";
    }    

    /**
    * @OA\Put(
    *     path="/api/alumnos/edit/{id}",
    *     summary="Modificar informacion alumno",
    *     @OA\Response(
    *         response=200,
    *         description="Modificar informacion de un alumno segun su id"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */          
    public function update(Request $request, int $id)
    {
        $alumno = Alumno::find($id);
        if ($alumno) {
            $alumno->nombre = $request->nombre;
            $alumno->apellido = $request->apellido;
            $alumno->correo = $request->correo;
            $alumno->telefono = $request->telefono;
            $alumno->pais = $request->pais;
            $alumno->save();
            
            return "Alumno modificado !! ";            
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }    
    }

    /**
    * @OA\Delete(
    *     path="/api/alumnos/delete/{id}",
    *     summary="Borrar alumno",
    *     @OA\Response(
    *         response=200,
    *         description="Borrar alumno segun su id"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */       
    public function delete(int $id)
    {
        $alumno = Alumno::find($id);
        if ($alumno) {
            $alumno->activo = 0;
            $alumno->save();
            
            return "Alumno borrado !! ";          
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }    
    }       
}
