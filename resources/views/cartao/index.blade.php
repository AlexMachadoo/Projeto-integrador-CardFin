    @extends('layouts.app')
   
    @section('content')
        <div class="container">
            <h1>Lista de Cartões</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Limite</th>
                        <th>Renda Mínima</th>
                        <th>Tipo de Cartão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CardFin Black</td>
                        <td>R$ 30.000,00</td>
                        <td>R$ 35.000,00</td>
                        <td>Débito/Crédito</td>
                        <td>
                            <a href="{{ route('cartao.create', ['cartaoId' => 1]) }}" class="btn btn-success">Fazer Pedido</a>
                        </td>
                    </tr>
                    <tr>
                        <td>CardFin Platinum</td>
                        <td>R$ 15.000,00</td>
                        <td>R$ 17.000,00</td>
                        <td>Débito/Crédito</td>
                        <td>
                            <a href="{{ route('cartao.create', ['cartaoId' => 2]) }}" class="btn btn-success">Fazer Pedido</a>
                        </td>
                    </tr>
                    <tr>
                        <td>CardFin Gold</td>
                        <td>R$ 10.000,00</td>
                        <td>R$ 12.000,00</td>
                        <td>Débito/Crédito</td>
                        <td>
                            <a href="{{ route('cartao.create', ['cartaoId' => 3]) }}" class="btn btn-success">Fazer Pedido</a>
                        </td>
                    </tr>
                    <tr>
                        <td>CardFin Silver</td>
                        <td>R$ 3.000,00</td>
                        <td>R$ 3.200,00</td>
                        <td>Débito/Crédito</td>
                        <td>
                            <a href="{{ route('cartao.create', ['cartaoId' => 4]) }}" class="btn btn-success">Fazer Pedido</a>
                        </td>
                    </tr>
                    <tr>
                        <td>CardFin Basic</td>
                        <td>R$ 1.000,00</td>
                        <td>R$ 1.200,00</td>
                        <td>Débito/Crédito</td>
                        <td>
                            <a href="{{ route('cartao.create', ['cartaoId' => 5]) }}" class="btn btn-success">Fazer Pedido</a>
                        </td>
                    </tr>
                    <tr>
                        <td>CardFin Starter</td>
                        <td>R$ 500,00</td>
                        <td>R$ 600,00</td>
                        <td>Débito/Crédito</td>
                        <td>
                            <a href="{{ route('cartao.create', ['cartaoId' => 6]) }}" class="btn btn-success">Fazer Pedido</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            
            <div class="mt-3">
                <a href="{{ route('cartao.etapa4', ['cartaoId' => $ultimoCartao->id ?? 1]) }}" class="btn btn-primary"> Solicitações</a>
            </div>
        </div>
    @endsection
    <script src="js/cartoes/index.js"></script>
  
