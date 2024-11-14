<?php

use App\Http\Controllers\EmprestimosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartaoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rotas de Cartão
    Route::get('/cartao/{cartaoId}/etapa3', [CartaoController::class, 'etapa3'])->name('cartao.etapa3');

    Route::resource('cartao', CartaoController::class);
    Route::get('/cartao/{cartaoId}/etapa3', [CartaoController::class, 'etapa3'])->name('cartao.etapa3');
    Route::get('/cartao/{cartaoId}/etapa4', [CartaoController::class, 'etapa4'])->name('cartao.etapa4');

    // Rotas de Empréstimos
    Route::resource('emprestimos', EmprestimosController::class);
    Route::get('emprestimos/calculos', [EmprestimosController::class, 'calculo'])->name('emprestimos.calculo');
    Route::get('emprestimos/status/{id}', [EmprestimosController::class, 'show'])->name('emprestimos.show');
    Route::get('/emprestimos/{id}/confirmar', [EmprestimosController::class, 'confirmar'])->name('emprestimos.confirmar');
    Route::get('/emprestimos/{id}/recusar', [EmprestimosController::class, 'recusar'])->name('emprestimos.recusar');
    Route::get('/statusdesolicitacao', [EmprestimosController::class, 'statusDesolicitacao'])->name('statusdesolicitacao');
});

// Rotas de Perfil do Usuário
    Route::middleware('auth')->group(function () {
    Route::get('/cartao/{cartaoId}', [CartaoController::class, 'show'])->name('cartao.show');
    Route::get('/user-profile', [ProfileController::class, 'show'])->name('user-profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
