@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">Novo Empréstimo - CardFin</h1>

        <form action="{{ route('emprestimos.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="valor" class="block text-lg font-medium">Valor do Empréstimo</label>
        <input type="number" name="valor" id="valor" class="border rounded px-4 py-2 w-full" placeholder="Ex.: 1000.00" required>
    </div>

    <div class="mb-4">
        <label for="data_emprestimo" class="block text-lg font-medium">Data de Empréstimo</label>
        <input type="date" name="data_emprestimo" id="data_emprestimo" class="border rounded px-4 py-2 w-full" required>
    </div>

    <div class="mb-4">
        <label for="numero_parcelas" class="block text-lg font-medium">Número de Parcelas</label>
        <input type="number" name="numero_parcelas" id="numero_parcelas" class="border rounded px-4 py-2 w-full" placeholder="Ex.: 12" required>
    </div>

    <div class="mb-4">
        <label for="tipo_credito" class="block text-lg font-medium">Tipo de Crédito</label>
        <select name="tipo_credito" id="tipo_credito" class="border rounded px-4 py-2 w-full" required>
            <option value="pessoal">Pessoal</option>
            <option value="imobiliario">Imobiliário</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-4">Próximo Passo</button>
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

            let jurosPercentual = tipoCredito === 'pessoal' ? 0.06 : 0.04;
            let iofPercentual = 0.03;

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
    <link href="{{ asset('css/emprestimo/create.css') }}" rel="stylesheet">

    <script src="{{ asset('js/emprestimo/create.js') }}"></script>

@endsection
