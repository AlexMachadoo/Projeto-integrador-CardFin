@extends('layouts.app')

@section('content')
    <style>
        .fundo-escuro {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #333;
        }

        .container-emprestimo {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .container-emprestimo h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .contrato-aprovado {
            color: green;
            font-weight: bold;
        }

        .contrato-reprovado {
            color: red;
            font-weight: bold;
        }

        .btn-solicitar {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-solicitar:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="fundo-escuro">
        <div class="container-emprestimo">
            <h2>Detalhes do Empréstimo</h2>
            <div class="form-group">
                <p><strong>Nome do Solicitante:</strong> {{ $emprestimo->nome }}</p>
                <p><strong>Valor do Empréstimo:</strong> R$ {{ number_format($emprestimo->valor, 2, ',', '.') }}</p>
                <p><strong>Parcelas:</strong> {{ $emprestimo->parcelas }} vezes</p>
                <p><strong>Taxa de Juros:</strong> {{ $emprestimo->taxa_juros }}%</p>
                <p><strong>Renda Mensal:</strong> R$ {{ number_format($emprestimo->renda_mensal, 2, ',', '.') }}</p>
            </div>

            <div class="form-group">
                <h3 class="{{ $aprovado ? 'contrato-aprovado' : 'contrato-reprovado' }}">
                    @if($aprovado)
                        Seu empréstimo foi aprovado!
                    @else
                        Infelizmente, sua solicitação foi reprovada.
                    @endif
                </h3>
            </div>

            <div class="form-group">
                @if(!$aprovado)
                    <a href="{{ route('emprestimos.solicitar', ['id' => $emprestimo->id]) }}" class="btn-solicitar">
                        Solicitar Novo Empréstimo
                    </a>
                @else
                    <a href="{{ route('emprestimos.status', ['id' => $emprestimo->id]) }}" class="btn-solicitar">
                        Verificar Status do Empréstimo
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
