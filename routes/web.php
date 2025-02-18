<?php

use App\Http\Controllers\Auth\RegisteredUserController;
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
use App\Http\Controllers\CurriculoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\VagasController;

Route::get('/', [EventController::class, 'index'])->name('inicio');

Route::get('/events/create', [EventController::class, 'create']);

Route::get('/contact', [EventController::class, 'contact']);

// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.form');

//login empresa
Route::post('/login/empresa', [LoginController::class, 'loginEmpresa'])->name('login.formEmpresa');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/usuarios/{id?}', [EventController::class, 'usuarios']);

Route::get("/about", [EventController::class, 'about']);

//rota para detalhes vaga e candidatos nelas
Route::get("/detalhes_vaga/{id}", [EventController::class,'detalhes_vaga'])->name('detalhes_vaga');
Route::get("/candidatos_vaga/{id}", [EventController::class,'candidatos_vaga'])->name('candidatos_vaga');

//rota para ver detalhes candidato
Route::get("/candidato/{cpf}", [EventController::class,'candidato'])->name('candidato');

// CRUD VAGAS
    //CRIAR
    Route::get("/criar_vaga", [EventController::class,'criar_vaga'])->name('criar_vaga');
    Route::post('/cria_vaga', [EventController::class, 'cria_vaga'])->name('vaga.create');
    //DELETAR

    //UPDATE
    Route::get("/update_vaga/{id}", [VagasController::class,'update_vaga_view'])->name('vaga.update.view');
    Route::post('/update_vaga_sent', [VagasController::class, 'update_vaga'])->name('vaga.update');
    //CLOSE

// ROTA DE FOMRULARIO CADASTRO E POST CRIAR USUARIO
// Show the registration form (GET request)
Route::get('/register', [EventController::class, 'register'])->name('register');

// register usuario
Route::post('/register', [RegisteredUserController::class, 'store']);
//register empresa
// Handle the registration form submission (POST request)
Route::post('/register', [RegisteredUserController::class, 'storeEmpresa']);

Route::middleware(['auth'])->group(function () {
    Route::post('/resumes', [CurriculoController::class, 'store'])->name('resumes.store');
    Route::get('/resumes/{resume}', [CurriculoController::class, 'show'])->name('resumes.show');
});

// APLICAR NA VAGA 
Route::get('/aplicar/{vagaId}', [EventController::class, 'aplicar'])->name('aplicar_id');

// profile 

Route::get('/edit', [PerfilController::class, 'edit'])->name('edit');



//edicao do perfil
Route::middleware('auth')->group(function () {
    // Exibe o formulário de edição do perfil
    Route::get('/profile/edit', [PerfilController::class, 'edit'])->name('profile.edit');

    // Atualiza as informações do perfil
    Route::patch('/profile/update', [PerfilController::class, 'update'])->name('profile.update');

    // Deleta a conta do usuário
    Route::delete('/profile/delete', [PerfilController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth:empresa'])->group(function () {
    Route::patch('/profile/update', [PerfilController::class, 'update_empresa'])->name('profile.update');
});

Route::middleware(['auth:web'])->group(function () {
    Route::patch('/profile/update', [PerfilController::class, 'update'])->name('profile.update');
});


