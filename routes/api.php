<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\AlumnosCursoController;
use App\Http\Controllers\MaestrosCursoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cursos', [CursoController::class, 'cursos']);
Route::get('/cursos/{id}', [CursoController::class, 'getById']);
Route::post('/cursos/new', [CursoController::class, 'nuevocurso']);
Route::put('/cursos/edit/{id}', [CursoController::class, 'update']);
Route::put('/cursos/delete/{id}', [CursoController::class, 'delete']);

Route::get('/alumnos', [AlumnoController::class, 'alumnos']);
Route::get('/alumnos/{id}', [AlumnoController::class, 'getById']);
Route::post('/alumnos/new', [AlumnoController::class, 'nuevoalumno']);
Route::put('/alumnos/edit/{id}', [AlumnoController::class, 'update']);
Route::put('/alumnos/delete/{id}', [AlumnoController::class, 'delete']);

Route::get('/maestros', [MaestroController::class, 'maestros']);
Route::get('/maestros/{id}', [MaestroController::class, 'getById']);
Route::post('/maestros/new', [MaestroController::class, 'nuevomaestro']);
Route::put('/maestros/edit/{id}', [MaestroController::class, 'update']);
Route::put('/maestros/delete/{id}', [MaestroController::class, 'delete']);

Route::get('/asistencias', [AsistenciaController::class, 'asistencias']);
Route::get('/asistencias/{id}', [AsistenciaController::class, 'getById']);
Route::post('/asistencias/new', [AsistenciaController::class, 'nuevoasistencia']);

Route::get('/alumnoscursos', [AlumnosCursoController::class, 'alumnoscursos']);
Route::get('/alumnoscursos/{id}', [AlumnosCursoController::class, 'getById']);
Route::post('/alumnoscursos/new', [AlumnosCursoController::class, 'nuevamatricula']);

Route::get('/maestroscursos', [MaestrosCursoController::class, 'maestroscursos']);
Route::get('/maestroscursos/{id}', [MaestrosCursoController::class, 'getById']);
Route::post('/maestroscursos/new', [MaestrosCursoController::class, 'asignatura']);

Route::get('/users', [UserController::class, 'index']);

