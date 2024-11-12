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

        .container-cartao {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .container-cartao h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-check {
            margin-top: 10px;
            text-align: left;
        }

        .contrato-aprovado {
            color: green;
            font-weight: bold;
        }

        .contrato-reprovado {
            color: red;
            font-weight: bold;
        }
    </style>

    <div class="fundo-escuro">
        <div class="container-cartao">
            <h2>Contrato Simulado - Solicitação do Cartão</h2>
            <div class="form-group">
                <p><strong>Nome:</strong> {{ $cartao->nome }}</p>
                <p><strong>Limite:</strong> R$ {{ number_format($cartao->limite, 2, ',', '.') }}</p>
                <p><strong>Renda Mínima:</strong> R$ {{ number_format($cartao->renda_minima, 2, ',', '.') }}</p>
                <p><strong>Tipo de Cartão:</strong> {{ $cartao->tipo_cartao }}</p>
            </div>

            <div class="form-group">
                <h3 class="{{ $aprovado ? 'contrato-aprovado' : 'contrato-reprovado' }}">
                    @if($aprovado)
                        Seu cartão foi aprovado!
                    @else
                        Infelizmente, sua solicitação foi reprovada.
                    @endif
                </h3>
            </div>

            <div class="form-group">
                <a href="{{ route('cartao.index') }}" class="btn btn-primary">Voltar para a página inicial</a>
            </div>
        </div>
    </div>
@endsection
