<?php

use App\Http\Controllers\EmprestimosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartaoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Rotas para Cartão
    Route::resource('cartao', CartaoController::class);
    Route::get('/cartao', [CartaoController::class, 'index'])->name('cartao.index');
    Route::get('/cartao/{id}', [CartaoController::class, 'show'])->name('cartao.show');
    Route::get('/cartao/{id}/edit', [CartaoController::class, 'edit'])->name('cartao.edit');
    Route::get('/cartao/etapa3', [CartaoController::class, 'etapa3'])->name('cartao.etapa3');
    Route::get('/cartao/etapa4', [CartaoController::class, 'etapa4'])->name('cartao.etapa4');
     Route::get('/cartao/{cartaoId}/etapa3', [CartaoController::class, 'etapa3'])->name('cartao.etapa3');
    Route::get('/cartao/{cartaoId}/etapa4', [CartaoController::class, 'etapa4'])->name('cartao.etapa4');

    // Rotas para Empréstimos
    Route::resource('emprestimos', EmprestimosController::class);
    Route::get('/dashboard', [EmprestimosController::class, 'dashboard'])->name('dashboard');
    Route::get('emprestimos/calculos', [EmprestimosController::class, 'calculo'])->name('emprestimos.calculo');
    Route::get('emprestimos/status/{id}', [EmprestimosController::class, 'show'])->name('emprestimos.show');
    Route::get('/emprestimo/calculo', [EmprestimosController::class, 'calculo'])->name('emprestimos.calculo');
    Route::post('/emprestimos', [EmprestimosController::class, 'store'])->name('emprestimos.store');
    Route::get('/emprestimos/{id}/confirmar', [EmprestimosController::class, 'confirmar'])->name('emprestimos.confirmar');
    Route::get('/emprestimos/{id}/recusar', [EmprestimosController::class, 'recusar'])->name('emprestimos.recusar');

    // Rota para Status da Solicitação
    Route::get('/statusdesolicitacao', [EmprestimosController::class, 'statusDesolicitacao'])->name('statusdesolicitacao');

    Route::get('/statusSolicitacao', [EmprestimosController::class, 'statusDesolicitacao'])->name('statusSolicitacao');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

require __DIR__ . '/auth.php';
