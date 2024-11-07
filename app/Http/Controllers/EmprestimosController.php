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
        $request->validate([
            'usuario' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'nullable|date',
        ]);

        Emprestimo::create($request->all());
        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo criado com sucesso!');
    }

    public function edit(Emprestimo $emprestimo)
    {
        return view('emprestimos.edit', compact('emprestimo'));
    }

    public function update(Request $request, Emprestimo $emprestimo)
    {
        $request->validate([
            'usuario' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'nullable|date',
        ]);

        $emprestimo->update($request->all());
        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo atualizado com sucesso!');
    }

    public function destroy(Emprestimo $emprestimo)
    {
        $emprestimo->delete();
        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo excluído com sucesso!');
    }
}
