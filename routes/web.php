<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurriculoController;


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

Route::get('/', [EventController::class, 'index'])->name('inicio');

Route::get('/events/create', [EventController::class, 'create']);

Route::get('/contact', [EventController::class, 'contact']);

// Route for displaying the login form (GET method)
Route::get('/login', [EventController::class, 'showLoginForm'])->name('login.form');
// Route for submitting the login form (POST method)
Route::post('/login', [EventController::class, 'login'])->name('login');

Route::get('/usuarios/{id?}', [EventController::class, 'usuarios']);

Route::get("/about", [EventController::class, 'about']);

Route::get("/detalhes_vaga/{id}", [EventController::class,'detalhes_vaga'])->name('detalhes_vaga');

Route::get("/candidatos_vaga/{id}", [EventController::class,'candidatos_vaga'])->name('candidatos_vaga');


// ROTA DE FORMULARIO CRIAR VAGA E POST CRIAR VAGA
Route::get("/criar_vaga", [EventController::class,'criar_vaga'])->name('criar_vaga');
Route::post('/cria_vaga', [EventController::class, 'cria_vaga'])->name('vaga.create');

// ROTA DE FOMRULARIO CADASTRO E POST CRIAR USUARIO
// Show the registration form (GET request)
Route::get('/register', [EventController::class, 'register'])->name('register');

// Handle the registration form submission (POST request)
Route::post('/register', [EventController::class, 'registerSubmit']);

Route::middleware(['auth'])->group(function () {
    Route::post('/resumes', [CurriculoController::class, 'store'])->name('resumes.store');
    Route::get('/resumes/{resume}', [CurriculoController::class, 'show'])->name('resumes.show');
});

// APLICAR NA VAGA 
Route::get('/aplicar/{vagaId}', [EventController::class, 'aplicar'])->name('aplicar_id');

