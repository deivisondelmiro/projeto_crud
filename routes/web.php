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

// Rotas públicas (qualquer pessoa pode ver os cursos)
Route::get('/', [CursoController::class, 'index'])->name('home');
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos');

// Rotas que exigem autenticação (usuários logados)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [CursoController::class, 'dashboard'])->name('dashboard');
    Route::post('/cursos/join/{id}', [CursoController::class, 'joinCurso'])->name('curso.join');
    Route::delete('/cursos/leave/{id}', [CursoController::class, 'leaveCurso'])->name('curso.leave');
    Route::post('/cursos/finalizar/{id}', [CursoController::class, 'finalizar'])->name('curso.finalizar');

    Route::middleware(['admin'])->group(function () {
        // Criar curso
        Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
        Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
        
        // Editar curso
        Route::get('/cursos/edit/{id}', [CursoController::class, 'edit'])->name('cursos.edit');
        Route::put('/cursos/update/{id}', [CursoController::class, 'update'])->name('cursos.update');
        
        // Deletar curso
        Route::delete('/cursos/{id}', [CursoController::class, 'destroy'])->name('cursos.destroy');
    });
});
Route::get('/cursos/{id}', [CursoController::class, 'show'])->name('curso.show');