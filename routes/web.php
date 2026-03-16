<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CursoController::class, 'index']);
Route::get('/cursos/create', [CursoController::class, 'create'])->middleware('auth');
Route::get('/cursos/{id}', [CursoController::class, 'show']);
Route::post('/cursos', [CursoController::class, 'store']);
Route::delete('/cursos/{id}', [CursoController::class, 'destroy'])->middleware('auth');
Route::get('/dashboard', [CursoController::class, 'dashboard'])->middleware('auth');
Route::get('/cursos/edit/{id}', [CursoController::class, 'edit'])->middleware('auth');
Route::put('/cursos/update/{id}', [CursoController::class, 'update'])->middleware('auth');
Route::post('/cursos/join/{id}', [CursoController::class, 'joinCurso'])->middleware('auth');