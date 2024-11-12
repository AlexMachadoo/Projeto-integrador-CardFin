@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="text-center my-6">
        <h1 class="text-4xl font-bold text-blue-600">Ofertas de Empréstimos Exclusivas!</h1>
        <p class="mt-4 text-lg text-gray-700">Aproveite as melhores condições do mercado com taxas de juros especiais para você.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 my-8">
        <div class="bg-blue-50 p-6 rounded-lg shadow-lg text-center">
            <h3 class="text-2xl font-semibold text-blue-700">Taxa de Juros Reduzida</h3>
            <p class="mt-4 text-gray-600">A partir de 1.5% ao mês</p>
        </div>
        <div class="bg-green-50 p-6 rounded-lg shadow-lg text-center">
            <h3 class="text-2xl font-semibold text-green-700">Parcelas Flexíveis</h3>
            <p class="mt-4 text-gray-600">Em até 48x sem complicações</p>
        </div>
        <div class="bg-purple-50 p-6 rounded-lg shadow-lg text-center">
            <h3 class="text-2xl font-semibold text-purple-700">Aprovação Rápida</h3>
            <p class="mt-4 text-gray-600">Com resposta em até 24 horas</p>
        </div>
    </div>

    <div class="text-center mt-16">
        <a href="{{ route('emprestimos.create') }}" class="bg-red-500 text-white py-3 px-6 rounded-lg text-lg font-semibold hover:bg-red-600 transition-colors">
            Solicitar Novo Empréstimo
        </a>
    </div>
</div>
@endsection
