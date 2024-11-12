@extends('layouts.app')

@section('content')
    <link
        rel="stylesheet"
        href="css/cartoes/etapa4.css"
    >
    <div class="container">
        <h1>Detalhes do Cartão</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Limite</th>
                    <th>Renda Mínima</th>
                    <th>Tipo de Cartão</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cartao->nome }}</td>
                    <td>R$ {{ number_format($cartao->limite, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($cartao->renda_minima, 2, ',', '.') }}</td>
                    <td>{{ $cartao->tipo_cartao }}</td>
                </tr>
            </tbody>
        </table>

        
        
        <div class="d-flex gap-2 mt-4">
            <a href="{{ route('cartao.index') }}" class="btn btn-primary rounded-pill custom-button">Voltar</a>
            <a href="{{ route('cartao.etapa3', ['cartaoId' => $cartao->id]) }}" class="btn btn-primary rounded-pill custom-button">Status de solicitação</a>
        </div>
    </div>
@endsection
