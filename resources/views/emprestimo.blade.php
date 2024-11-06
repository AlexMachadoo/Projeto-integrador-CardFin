<!-- resources/views/emprestimo.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerenciamento de Empréstimos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Novo Empréstimo</h1>
            <p class="text-lg mb-6">Aqui você pode visualizar e gerenciar todos os empréstimos.</p>

            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Lista de Empréstimos</h3>
                <table class="min-w-full bg-white dark:bg-gray-800 mt-4 rounded-lg overflow-hidden shadow">
                    <thead>
                        <tr>
                            <th class="text-left p-4 bg-gray-200 dark:bg-gray-700">Nome do Usuário</th>
                            <th class="text-left p-4 bg-gray-200 dark:bg-gray-700">Item</th>
                            <th class="text-left p-4 bg-gray-200 dark:bg-gray-700">Valor Emprestado</th>
                            <th class="text-left p-4 bg-gray-200 dark:bg-gray-700">Data de Vencimento</th>
                            <th class="text-left p-4 bg-gray-200 dark:bg-gray-700">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emprestimos as $emprestimo)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                <td class="p-4">{{ $emprestimo->usuario }}</td>
                                <td class="p-4">{{ $emprestimo->item }}</td>
                                <td class="p-4">R$ {{ number_format($emprestimo->valor_emprestado, 2, ',', '.') }}</td>
                                <td class="p-4">{{ $emprestimo->data_devolucao ? $emprestimo->data_devolucao->format('d/m/Y') : 'Não especificada' }}</td>
                                <td class="p-4">
                                    <a href="{{ route('emprestimos.edit', $emprestimo) }}" class="text-blue-500 hover:underline">Editar</a>
                                    <form action="{{ route('emprestimos.destroy', $emprestimo) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
