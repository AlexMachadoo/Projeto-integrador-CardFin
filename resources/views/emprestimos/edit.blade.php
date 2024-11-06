<!-- resources/views/emprestimos/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">Editar Empréstimo</h1>

        <form action="{{ route('emprestimos.update', $emprestimo) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="usuario">Usuário</label>
                <input type="text" name="usuario" value="{{ $emprestimo->usuario }}" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="item">Item</label>
                <input type="text" name="item" value="{{ $emprestimo->item }}" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="data_emprestimo">Data de Empréstimo</label>
                <input type="date" name="data_emprestimo" value="{{ $emprestimo->data_emprestimo }}" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="data_devolucao">Data de Devolução</label>
                <input type="date" name="data_devolucao" value="{{ $emprestimo->data_devolucao }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Atualizar Empréstimo</button>
        </form>
    </div>
@endsection
