function nextStep() {
    const etapa1 = document.getElementById('etapa-1');
    const etapa2 = document.getElementById('etapa-2');
    const valor = parseFloat(document.getElementById('valor').value);
    const parcelas = parseInt(document.getElementById('parcelas').value);
    const tipoCredito = document.querySelector('input[name="tipo_credito"]:checked').value;

    if (valor && parcelas) {
        
        const taxaJuros = tipoCredito === 'pessoal' ? 0.05 : 0.03;
        const valorBruto = valor * (1 + taxaJuros);
        const valorParcela = valorBruto / parcelas;
        const iof = valor * 0.02; 
        const jurosTotal = valorBruto - valor;
        const totalPagar = valorBruto + iof;

        document.getElementById('total-credito').textContent = valor.toFixed(2);
        document.getElementById('parcelas-info').textContent = parcelas;
        document.getElementById('valor-parcela').textContent = valorParcela.toFixed(2);
        document.getElementById('valor-bruto').textContent = valorBruto.toFixed(2);
        document.getElementById('iof').textContent = iof.toFixed(2);
        document.getElementById('juros-total').textContent = jurosTotal.toFixed(2);
        document.getElementById('total-pagar').textContent = totalPagar.toFixed(2);

        etapa1.classList.add('hidden');
        etapa2.classList.remove('hidden');
    } else {
        alert('Por favor, preencha todos os campos corretamente.');
    }
}

function previousStep() {
    const etapa1 = document.getElementById('etapa-1');
    const etapa2 = document.getElementById('etapa-2');

    etapa1.classList.remove('hidden');
    etapa2.classList.add('hidden');
}

function toggleContract(button) {
    const contractId = button.getAttribute('data-id');
    const contractContent = document.getElementById(`contract-${contractId}`);
    contractContent.classList.toggle('hidden');
}

function acceptTerms(button) {
    const contractId = button.getAttribute('data-id');
    alert(`Termos do contrato ${contractId} aceitos com sucesso!`);
    const contractContent = document.getElementById(`contract-${contractId}`);
    contractContent.classList.add('hidden');
}
