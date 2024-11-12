@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Cartão</h1>

        <form action="{{ route('cartao.store') }}" method="POST">
            @csrf
            <div class="step step-1">
                <h3>Etapa 1: Dados Básicos do Cartão</h3>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="renda_mensal">Renda Mensal</label>
                    <input type="number" name="renda_mensal" id="renda_mensal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tipo_cartao">Tipo de Cartão</label>
                    <select name="tipo_cartao" id="tipo_cartao" class="form-control" required>
                        <option value="debito">Débito</option>
                        <option value="debito_credito">Débito/Crédito</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="consentimento">
                        <input type="checkbox" name="consentimento" id="consentimento" required>
                        Eu li e aceito as condições de tratamento de dados
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Próximo</button>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cartoes/create.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/cartoes/create.js') }}"></script>
@endpush
