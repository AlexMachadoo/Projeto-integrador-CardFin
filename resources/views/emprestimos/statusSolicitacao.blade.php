@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="text-center mb-4">
            <h1 class="display-4">Status da Solicitação de Empréstimo</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-black">
                <h4>Detalhes do Empréstimo</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Valor</th>
                                <th>Parcelas</th>
                                <th>Tipo de Crédito</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>R$ {{ number_format($emprestimo->valor, 2, ',', '.') }}</td>
                                <td>{{ $emprestimo->numero_parcelas }}</td>
                                <td>{{ ucfirst($emprestimo->tipo_credito) }}</td>
                                <td>
                                    <span class="badge badge-{{ $emprestimo->status == 'confirmado' ? 'success' : ($emprestimo->status == 'pendente' ? 'warning' : 'danger') }}">
                                        {{ ucfirst($emprestimo->status) }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <a href="{{ route('emprestimos.confirmar', $emprestimo->id) }}" class="btn btn-lg btn-success mr-3">
                <i class="fas fa-check-circle"></i> Confirmar Empréstimo
            </a>
            <a href="{{ route('emprestimos.recusar', $emprestimo->id) }}" class="btn btn-lg btn-danger" onclick="return confirm('Tem certeza que deseja recusar este empréstimo?')">
                <i class="fas fa-times-circle"></i> Recusar Empréstimo
            </a>
        </div>
    </div>
@endsection
