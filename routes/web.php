<?php

use App\Http\Controllers\AlunosCreateController;
use App\Http\Controllers\AtividadesController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\DisciplinesController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuadroDeHorariosController;
use App\Http\Controllers\ResponseAlunosController;
use App\Models\Disciplines;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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

Route::middleware('autenticador')->group(function(){

    Route::post('/cadastro/aluno/store', [AlunosCreateController::class, 'createAluno'])->name('alunos.store');
    Route::get('/disciplines/index', [DisciplinesController::class, 'index'])->name('disciplines.index');
    Route::get('/disciplines/create', [DisciplinesController::class, 'create'])->name('disciplines.create');
    Route::post('/disciplines/store', [DisciplinesController::class, 'store'])->name('disciplines.store');
    Route::get('/disciplines/edit/{id}', [DisciplinesController::class, 'edit'])->name('disciplines.edit');
    Route::post('/disciplines/update/{id}', [DisciplinesController::class, 'update'])->name('disciplines.update');
    Route::get('/disciplines/destroy/{id}', [DisciplinesController::class, 'destroy'])->name('disciplines.destroy');

    Route::get('/atividades/create/{id}', [AtividadesController::class, 'create'])->name('atividades.create');
    Route::post('/atividades/store/{id}', [AtividadesController::class, 'store'])->name('atividades.store');
    Route::get('/atividades/index/{id}', [AtividadesController::class, 'index'])->name('atividades.index');
    Route::get('/atividades/edit/{id}', [AtividadesController::class, 'edit'])->name('atividades.edit');
    Route::put('/atividades/update/{id}', [AtividadesController::class, 'update'])->name('atividades.update');
    Route::get('/atividades/destroy/{id}', [AtividadesController::class, 'destroy'])->name('atividades.destroy');
    Route::get('/destroy/professor/{id}', [LoginController::class, 'destroy'])->name('professores.destroy');
    Route::get('/atividades/responder/{id}', [AtividadesController::class, 'retornarActivities'])->name('atividades.responder');
    Route::get('/atividadades/respondida/{id}', [AtividadesController::class, 'createResposta'])->name('atividades.respondida');
    Route::post('/atividades/respondida/store/{id}', [AtividadesController::class, 'resposta'])->name('resposta');

    Route::get('/cadastro/aluno', [AlunosCreateController::class, 'create'])->name('alunos.create');
    Route::get('/alunos/atividades/{id}', [AlunosCreateController::class, 'index'])->name('alunos.index');
    Route::get('/alunos/atividades/image/{id}', [AlunosCreateController::class, 'visualizarImage'])->name('alunos.image');
    Route::get('/alunos/atividades/niveis/{id}', [AlunosCreateController::class, 'show'])->name('alunos.show');
    Route::get('alunos/atividades/edit/{id}', [AlunosCreateController::class,'edit'])->name('alunos.edit');
    Route::put('/alunos/update/{id}', [AlunosCreateController::class, 'update'])->name('alunos.update');
    Route::get('/alunos/destroy/atividade/{id}', [AlunosCreateController::class, 'destroy'])->name('alunos.destroy');

    Route::get('response/alunos/{id}', [ResponseAlunosController::class,'index'])->name('response.index');
    Route::get('/atividade/professores/alunos/{id}', [ResponseAlunosController::class, 'image'])->name('response.image');
    Route::get('/professores/notes/alunos/{id}', [ResponseAlunosController::class, 'create'])->name('response.create');
    Route::post('/professores/notes/alunos/store/{id}', [ResponseAlunosController::class, 'store'])->name('response.store');
    //QUADRO DE HORÁRIOS
    Route::get('/horarios/index', [QuadroDeHorariosController::class, 'index'])->name('horarios.index');
});
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', function(){
    return view('principal.create');
})->name('login');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');
Route::post('/alunos/login', [AlunosCreateController::class, 'login'])->name('alunos.login');




Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');
Route::post('/cadastro/store', [CadastroController::class, 'store'])->name('cadastro.store');
