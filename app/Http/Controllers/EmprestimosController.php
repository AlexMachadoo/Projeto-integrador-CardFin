<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;

class EmprestimosController extends Controller
{
    public function index()
    {
        $emprestimos = Emprestimo::all();
        return view('emprestimos.index', compact('emprestimos'));
    }

    public function dashboard()
    {
        $emprestimos = Emprestimo::all();
        return view('dashboard', compact('emprestimos'));
    }

    public function create()
    {
        return view('emprestimos.create');
    }

    public function store(Request $request)
    {
        $this->validateEmprestimo($request);

        $valor = $request->valor;
        $numeroParcelas = $request->numero_parcelas;
        $tipoCredito = $request->tipo_credito;

        $jurosMensais = 0.02;
        $jurosAnuais = 0.25;

        if ($numeroParcelas > 12) {
            $valorComJuros = $valor * pow(1 + $jurosMensais, $numeroParcelas);
            $valorComJurosAnual = $valorComJuros * (1 + $jurosAnuais);
        } else {
            $valorComJuros = $valor * pow(1 + $jurosMensais, $numeroParcelas);
            $valorComJurosAnual = $valorComJuros;
        }

        $emprestimo = new Emprestimo();
        $emprestimo->valor = $valorComJurosAnual;
        $emprestimo->data_emprestimo = $request->data_emprestimo;
        $emprestimo->numero_parcelas = $numeroParcelas;
        $emprestimo->tipo_credito = $tipoCredito;
        $emprestimo->numero_parcela = 1;
        $emprestimo->save();

        return redirect()->route('emprestimos.show', ['id' => $emprestimo->id])->with('success', 'Empréstimo registrado com sucesso!');
    }

    public function edit(Emprestimo $emprestimo)
    {
        return view('emprestimos.edit', compact('emprestimo'));
    }

    public function update(Request $request, Emprestimo $emprestimo)
    {
        $this->validateEmprestimo($request);

        $emprestimo->update($request->all());

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo atualizado com sucesso!');
    }

    public function destroy(Emprestimo $emprestimo)
    {
        $emprestimo->delete();
        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo excluído com sucesso!');
    }

    public function statusDesolicitacao()
    {

        $status = 'Aprovado';
        $tipoCredito = 'Crédito Pessoal';
        $parcelas = 12;
        $valorTotal = 1200.00;


        return view('emprestimos.statusSolicitacao', compact('status', 'tipoCredito', 'parcelas', 'valorTotal'));
    }

    public function show($id)
    {
        $emprestimo = Emprestimo::findOrFail($id);
        return view('emprestimos.statusSolicitacao', compact('emprestimo'));
    }

    private function validateEmprestimo(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric|min:500',
            'data_emprestimo' => 'required|date',
            'numero_parcelas' => 'required|integer|min:1',
            'tipo_credito' => 'required|string|in:pessoal,imobiliario',
        ]);
    }

    public function confirmar($id)
    {
        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->status = 'confirmado';
        $emprestimo->save();

        return redirect()->route('emprestimos.index')->with('success', 'Parabéns pelo seu empréstimo!');
    }

    public function recusar($id)
    {
        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->delete();

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo excluído com sucesso!');
    }

    public function calculo(Request $request)
    {
        $valor = $request->valor;
        $parcelas = $request->numero_parcelas;
        $tipoCredito = $request->tipo_credito;

        if ($tipoCredito === 'pessoal') {
            $jurosPercentual = 0.06;
        } else {
            $jurosPercentual = 0.04;
        }

        $iofPercentual = 0.03;
        $jurosTotal = $valor * $jurosPercentual;
        $iof = $valor * $iofPercentual;
        $valorBruto = $valor + $jurosTotal + $iof;

        if ($parcelas > 0) {
            $valorParcela = $valorBruto / $parcelas;
        } else {
            return redirect()->back()->withErrors('O número de parcelas deve ser maior que zero.');
        }

        $totalPagar = $valorBruto;

        return view('emprestimos.calculo', compact(
            'valor',
            'parcelas',
            'tipoCredito',
            'jurosTotal',
            'iof',
            'valorBruto',
            'valorParcela',
            'totalPagar'
        ));
    }
}
