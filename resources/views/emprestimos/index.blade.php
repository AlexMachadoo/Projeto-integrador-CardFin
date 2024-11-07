@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6">Lista de Empréstimos</h1>
    <a href="{{ route('emprestimos.create') }}" class="mb-4 inline-block bg-red-500 text-black py-2 px-4 rounded hover:bg-red-600">
        Novo Empréstimo
    </a>
    <div class="overflow-hidden border-b border-gray-200 shadow rounded-lg">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-4 text-gray-600">Usuário</th>
                    <th class="text-left p-4 text-gray-600">Valor do Empréstimo</th>
                    <th class="text-left p-4 text-gray-600">Valor da Parcela Mensal</th>
                    <th class="text-left p-4 text-gray-600">Número da Parcela</th>
                    <th class="text-left p-4 text-gray-600">Data de Empréstimo</th>
                    <th class="text-left p-4 text-gray-600">Data de Devolução</th>
                    <th class="text-left p-4 text-gray-600">Contrato</th>
                    <th class="text-left p-4 text-gray-600">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emprestimos as $emprestimo)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 border-b border-gray-200">{{ $emprestimo->usuario }}</td>
                    <td class="p-4 border-b border-gray-200">{{ $emprestimo->valor }}</td>
                    <td class="p-4 border-b border-gray-200">{{ $emprestimo->valor_parcela }}</td>
                    <td class="p-4 border-b border-gray-200">{{ $emprestimo->numero_parcela }}</td>
                    <td class="p-4 border-b border-gray-200">{{ \Carbon\Carbon::parse($emprestimo->data_emprestimo)->format('d/m/Y') }}</td>
                    <td class="p-4 border-b border-gray-200">{{ \Carbon\Carbon::parse($emprestimo->data_devolucao)->format('d/m/Y') }}</td>
                    <td class="p-4 border-b border-gray-200">
                        <div class="relative">
                            <button class="text-blue-500 hover:text-blue-600" data-id="{{ $emprestimo->id }}" onclick="toggleContract(this)">
                                Ver Contrato
                            </button>
                            <div id="contract-{{ $emprestimo->id }}" class="contract-content hidden mt-2 bg-gray-100 p-4 rounded-md max-h-60 overflow-auto">
                                <h3 class="font-bold">Contrato de Empréstimo</h3>
                                <p>Leia os termos e condições do empréstimo...</p>
                                <p class="mt-4">Você aceita os termos acima?</p>
                                <button class="accept-terms bg-green-500 text-white py-2 px-4 rounded" data-id="{{ $emprestimo->id }}" onclick="acceptTerms(this)">
                                    Aceitar Termos
                                </button>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 border-b border-gray-200">
                        <a href="{{ route('emprestimos.edit', $emprestimo) }}" class="action-button text-yellow-500 hover:text-yellow-600">Editar</a>
                        <form action="{{ route('emprestimos.destroy', $emprestimo) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-button text-red-500 hover:text-red-600">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('js/emprestimos/index.js') }}"></script>
@endsection
