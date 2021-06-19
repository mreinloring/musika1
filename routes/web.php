<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Profesores\ShowProfesores;
use App\Http\Livewire\Asignaturas\ShowAsignaturas;


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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', ShowProfesores::class)
 ->name('dashboard');

Route::get('/profesores',ShowProfesores::class)->name('profesores');
Route::get('/asignaturas', ShowAsignaturas::class)->name('asignaturas');


