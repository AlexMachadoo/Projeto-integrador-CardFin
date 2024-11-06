<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Empréstimos Recentes</h3>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow mt-2">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="text-left p-4">Nome do Usuário</th>
                                <th class="text-left p-4">Item</th>
                                <th class="text-left p-4">Valor Emprestado</th>
                                <th class="text-left p-4">Data de Vencimento</th>
                                <th class="text-left p-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emprestimos as $emprestimo)
                                <tr>
                                    <td class="p-4">{{ $emprestimo->usuario }}</td>
                                    <td class="p-4">{{ $emprestimo->item }}</td>
                                    <td class="p-4">R$ {{ number_format($emprestimo->valor_emprestado, 2, ',', '.') }}</td>
                                    <td class="p-4">
                                        @if ($emprestimo->data_devolucao)
                                            {{ \Carbon\Carbon::parse($emprestimo->data_devolucao)->format('d/m/Y') }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="p-4">
                                        @if($emprestimo->data_devolucao && \Carbon\Carbon::parse($emprestimo->data_devolucao) < now())
                                            <span class="text-red-500 font-semibold">Vencido</span>
                                        @else
                                            <span class="text-green-500 font-semibold">Ativo</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
