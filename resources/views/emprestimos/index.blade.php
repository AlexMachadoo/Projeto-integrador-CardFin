@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/emprestimos/index.css') }}">
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
