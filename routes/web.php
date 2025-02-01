<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);

Route::get('/events/create', [EventController::class, 'create']);

Route::get('/contact', [EventController::class, 'contact']);

Route::get('/login', [EventController::class,'login']);

Route::get('/usuarios/{id?}', [EventController::class, 'usuarios']);

Route::get("/register", [EventController::class, 'register']);

Route::get("/about", [EventController::class, 'about']);

Route::get("/detalhesvaga/{id}", [EventController::class,'detalhesvaga'])->name('detalhesvaga');

Route::get("/candidatosvaga/{id}", [EventController::class,'candidatosvaga'])->name('candidatosvaga');

Route::get("/criarvaga", [EventController::class,'criarvaga'])->name('criarvaga');

Route::post('/criavaga', [EventController::class, 'criavaga'])->name('vaga.create');