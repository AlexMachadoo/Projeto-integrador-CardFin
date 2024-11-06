<!-- resources/views/emprestimos/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class=" max-w-sm bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center mb-6">Novo Empréstimo</h1>

            <form action="{{ route('emprestimos.store') }}" method="POST" id="emprestimo-form">
                @csrf

                <!-- Etapa 1: Dados de Solicitação -->
                <div id="etapa-1" class="etapa">
                    <h2 class="text-lg font-semibold mb-4 text-center">Etapa 1: Dados de Solicitação</h2>

                    <div class="mb-4">
                        <label for="usuario" class="block text-sm mb-1">Nome</label>
                        <input type="text" name="usuario" class="form-control w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm mb-1">Tipo de Crédito</label>
                        <div class="flex justify-center space-x-4">
                            <label>
                                <input type="radio" name="tipo_credito" value="pessoal" id="credito-pessoal" checked>
                                <span class="ml-2">Crédito Pessoal</span>
                            </label>

                            <label>
                                <input type="radio" name="tipo_credito" value="imobiliario" id="credito-imobiliario">
                                <span class="ml-2">Crédito Imobiliário</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="valor" class="block text-sm mb-1">Valor do Crédito (mínimo R$ 500)</label>
                        <input type="number" name="valor" class="form-control w-full" required min="500">
                        <p id="valor-error" class="text-red-500 text-sm hidden">O valor mínimo de empréstimo é R$ 500.</p>
                    </div>

                    <div class="mb-4">
                        <label for="parcelas" class="block text-sm mb-1">Número de Parcelas</label>
                        <input type="number" name="parcelas" class="form-control w-full" required>
                        <p id="parcelas-error" class="text-red-500 text-sm hidden">O crédito imobiliário deve ter pelo menos 60 parcelas.</p>
                    </div>

                    <button type="button" class="btn btn-primary w-full" onclick="nextStep()">Próximo</button>
                </div>

                <!-- Etapa 2: Detalhes do Empréstimo -->
                <div id="etapa-2" class="etapa hidden">
                    <h2 class="text-lg font-semibold mb-4 text-center">Etapa 2: Detalhes do Empréstimo</h2>

                    <div class="bg-gray-100 p-4 rounded-lg shadow mb-4">
                        <p><strong>Total do Crédito:</strong> R$ <span id="total-credito">0,00</span></p>
                        <p><strong>Parcelas:</strong> <span id="parcelas-info">0</span> de R$ <span id="valor-parcela">0,00</span></p>
                        <p><strong>Valor Bruto:</strong> R$ <span id="valor-bruto">0,00</span></p>
                        <p><strong>IOF:</strong> R$ <span id="iof">0,00</span></p>
                        <p><strong>Juros Total:</strong> R$ <span id="juros-total">0,00</span></p>
                        <p><strong>Total a Pagar:</strong> R$ <span id="total-pagar">0,00</span></p>
                    </div>

                    <div class="flex justify-between">
                        <button type="button" class="btn btn-secondary" onclick="previousStep()">Voltar</button>
                        <button type="submit" class="btn btn-success">Salvar Empréstimo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const valorInput = document.querySelector('input[name="valor"]');
        const parcelasInput = document.querySelector('input[name="parcelas"]');
        const valorError = document.getElementById('valor-error');
        const parcelasError = document.getElementById('parcelas-error');
        const taxaJurosInput = 0.06;
        const taxaJurosImobiliario = 0.04;

        function calcularValores() {
            const valor = parseFloat(valorInput.value) || 0;
            const parcelas = parseInt(parcelasInput.value) || 0;
            const tipoCredito = document.querySelector('input[name="tipo_credito"]:checked').value;

            let taxaJuros = taxaJurosInput;
            let parcelasMinimas = 1;

            if (tipoCredito === "imobiliario") {
                taxaJuros = taxaJurosImobiliario;
                parcelasMinimas = 60;
            }

            if (valor < 500) {
                valorError.classList.remove('hidden');
                return;
            } else {
                valorError.classList.add('hidden');
            }

            if (tipoCredito === "imobiliario" && parcelas < parcelasMinimas) {
                parcelasError.classList.remove('hidden');
                return;
            } else {
                parcelasError.classList.add('hidden');
            }

            const totalCredito = valor;
            const valorParcela = (valor * (1 + taxaJuros * parcelas)) / parcelas;
            const valorBruto = valor * (1 + taxaJuros * parcelas);
            const iof = valor * 0.022;
            const jurosTotal = valorBruto - totalCredito;
            const totalPagar = valorBruto + iof;

            document.getElementById('total-credito').innerText = totalCredito.toFixed(2).replace('.', ',');
            document.getElementById('parcelas-info').innerText = parcelas;
            document.getElementById('valor-parcela').innerText = valorParcela.toFixed(2).replace('.', ',');
            document.getElementById('valor-bruto').innerText = valorBruto.toFixed(2).replace('.', ',');
            document.getElementById('iof').innerText = iof.toFixed(2).replace('.', ',');
            document.getElementById('juros-total').innerText = jurosTotal.toFixed(2).replace('.', ',');
            document.getElementById('total-pagar').innerText = totalPagar.toFixed(2).replace('.', ',');
        }

        function nextStep() {
            document.getElementById('etapa-1').classList.add('hidden');
            document.getElementById('etapa-2').classList.remove('hidden');
            calcularValores();
        }

        function previousStep() {
            document.getElementById('etapa-2').classList.add('hidden');
            document.getElementById('etapa-1').classList.remove('hidden');
        }

        valorInput.addEventListener('input', calcularValores);
        parcelasInput.addEventListener('input', calcularValores);
        document.querySelectorAll('input[name="tipo_credito"]').forEach(input => {
            input.addEventListener('change', calcularValores);
        });
    </script>
@endsection
