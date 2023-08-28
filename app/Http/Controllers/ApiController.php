<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asistencia;
use App\Models\Maestro;
use App\Models\AlumnosCurso;
use App\Models\MaestrosCurso;

class ApiController extends Controller
{
    public function users(){
        $users = User::all();
        return response()->json($users);
    }
    
    public function asistencias(){
        $asistencias = Asistencia::all();
        return response()->json($asistencias);
    }    

    public function maestros(){
        $maestros = Maestro::all();
        return response()->json($maestros);
    }  

    public function alumnoscursos(){
        $alumnoscursos = AlumnosCurso::all();
        return response()->json($alumnoscursos);
    }  

    public function maestroscursos(){
        $maestroscursos = MaestrosCurso::all();
        return response()->json($maestroscursos);
    }   
 
}