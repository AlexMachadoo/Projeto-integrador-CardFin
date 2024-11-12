@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">Resumo do Empréstimo</h1>

        <div class="mb-4">
            <p><strong>Valor do Empréstimo:</strong> R$ {{ number_format($valor, 2, ',', '.') }}</p>
            <p><strong>Parcelas:</strong> {{ $parcelas }}x</p>
            <p><strong>Tipo de Crédito:</strong> {{ ucfirst($tipoCredito) }}</p>
            <p><strong>Juros Total:</strong> R$ {{ number_format($jurosTotal, 2, ',', '.') }}</p>
            <p><strong>IOF:</strong> R$ {{ number_format($iof, 2, ',', '.') }}</p>
            <p><strong>Valor Bruto:</strong> R$ {{ number_format($valorBruto, 2, ',', '.') }}</p>
            <p><strong>Valor da Parcela:</strong> R$ {{ number_format($valorParcela, 2, ',', '.') }}</p>
            <p><strong>Total a Pagar:</strong> R$ {{ number_format($totalPagar, 2, ',', '.') }}</p>
        </div>

        <form action="{{ route('emprestimos.store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary mt-4">Finalizar e Registrar Empréstimo</button>
        </form>
    </div>
@endsectio
