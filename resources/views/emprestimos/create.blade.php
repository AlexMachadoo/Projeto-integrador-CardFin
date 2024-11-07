@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">Novo Empréstimo</h1>

        <form action="{{ route('emprestimos.store') }}" method="POST" id="emprestimo-form">
            @csrf
            <div id="etapa-1" class="etapa active">
                <div class="mb-4">
                    <label for="valor" class="block">Valor do Empréstimo</label>
                    <input type="number" name="valor" id="valor" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label for="parcelas" class="block">Número de Parcelas</label>
                    <input type="number" name="parcelas" id="parcelas" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label for="tipo_credito" class="block">Tipo de Crédito</label>
                    <div>
                        <input type="radio" name="tipo_credito" value="pessoal" id="pessoal" checked>
                        <label for="pessoal">Pessoal</label>
                        <input type="radio" name="tipo_credito" value="imobiliario" id="imobiliario">
                        <label for="imobiliario">Imobiliário</label>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="nextStep()">Próximo Passo</button>
            </div>

            <div id="etapa-2" class="etapa hidden">
                <div id="resumo" class="mb-4">
                    <h3 class="text-xl font-semibold">Resumo do Empréstimo</h3>
                    <div>
                        <p>Total do Crédito: R$<span id="total-credito">0.00</span></p>
                        <p>Parcelas: <span id="parcelas-info">0</span></p>
                        <p>Valor da Parcela: R$<span id="valor-parcela">0.00</span></p>
                        <p>Valor Bruto: R$<span id="valor-bruto">0.00</span></p>
                        <p>IOF: R$<span id="iof">0.00</span></p>
                        <p>Juros Total: R$<span id="juros-total">0.00</span></p>
                        <p>Total a Pagar: R$<span id="total-pagar">0.00</span></p>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" onclick="previousStep()">Voltar</button>
                <button type="submit" class="btn btn-success">Salvar Empréstimo</button>
            </div>
        </form>
    </div>

    <script>
        function nextStep() {
            const valor = parseFloat(document.getElementById('valor').value);
            const parcelas = parseInt(document.getElementById('parcelas').value);
            const tipoCredito = document.querySelector('input[name="tipo_credito"]:checked').value;

            if (!valor || !parcelas) {
                alert('Preencha todos os campos corretamente!');
                return;
            }

            if (tipoCredito === 'pessoal' && valor < 500) {
                alert('O valor mínimo para um empréstimo pessoal é R$ 500,00!');
                return;
            }

            if (tipoCredito === 'imobiliario') {
                if (valor < 80000) {
                    alert('O valor mínimo para um empréstimo imobiliário é R$ 80.000,00!');
                    return;
                }
                if (parcelas < 60) {
                    alert('O número mínimo de parcelas para um empréstimo imobiliário é 60!');
                    return;
                }
            }

            let jurosPercentual, iofPercentual = 0.03;

            if (tipoCredito === 'pessoal') {
                jurosPercentual = 0.06;
            } else {
                jurosPercentual = 0.04;
            }

            const jurosTotal = valor * jurosPercentual;
            const iof = valor * iofPercentual;
            const valorBruto = valor + jurosTotal + iof;
            const valorParcela = valorBruto / parcelas;
            const totalPagar = valorBruto;

            document.getElementById('total-credito').innerText = valor.toFixed(2);
            document.getElementById('parcelas-info').innerText = parcelas;
            document.getElementById('valor-parcela').innerText = valorParcela.toFixed(2);
            document.getElementById('valor-bruto').innerText = valorBruto.toFixed(2);
            document.getElementById('iof').innerText = iof.toFixed(2);
            document.getElementById('juros-total').innerText = jurosTotal.toFixed(2);
            document.getElementById('total-pagar').innerText = totalPagar.toFixed(2);

            document.getElementById('etapa-1').classList.add('hidden');
            document.getElementById('etapa-2').classList.remove('hidden');
        }

        function previousStep() {
            document.getElementById('etapa-2').classList.add('hidden');
            document.getElementById('etapa-1').classList.remove('hidden');
        }
    </script>
@endsection

@vite(['resources/css/app.css', 'resources/js/app.js'])
