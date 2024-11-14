@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 perfil-container">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4">{{ __('Perfil do Usuário') }}</h1>

    <section class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md perfil-section">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Informações do Perfil') }}</h3>
        <div class="mt-4">
            <p><strong>{{ __('Nome:') }}</strong> {{ Auth::user()->name }}</p>
            <p><strong>{{ __('Email:') }}</strong> {{ Auth::user()->email }}</p>
        </div>
    </section>

    <section class="mt-8 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md perfil-section">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Ações') }}</h3>
        <div class="mt-4 space-y-4">
            <!-- Botão para ver o status do cartão -->
            <p class="text-gray-700">
                <a href="{{ route('cartao.etapa3', ['cartaoId' => 1]) }}" class="text-green-500 hover:underline">
                    Clique aqui para verificar o status do seu cartão.
                </a>
            </p>
            <!-- Botão para ver detalhes do empréstimo -->
            <p class="text-gray-700">
                <a href="{{ route('emprestimos.show', ['id' => 1]) }}" class="text-blue-500 hover:underline">
                    Clique aqui para ver detalhes do seu empréstimo.
                </a>
            </p>
        </div>
    </section>

    <section class="mt-8 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md perfil-section">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Outras Ações') }}</h3>
        <div class="mt-4 space-y-4">
            <p class="text-gray-700">
                <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">
                    Editar Perfil
                </a>
            </p>
            <p class="text-gray-700">
                <a href="{{ route('logout') }}" class="text-red-500 hover:underline">
                    Sair
                </a>
            </p>
        </div>
    </section>
</div>
@endsection
