@extends('layouts.app')

@section('content')
<main class="container mx-auto p-4">
    <!-- Seção "A solução financeira certa para você" -->
    <section class="text-center mt-12">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200">A solução financeira certa para você</h2>
        <p class="text-lg text-gray-600 mt-4">Torne seus sonhos reais com a CardFin.</p>
    </section>

    <!-- Incluir Carrossel -->
    @include('carousel')
</main>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
@endsection
