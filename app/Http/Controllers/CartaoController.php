<?php

namespace App\Http\Controllers;

use App\Models\Cartao;
use Illuminate\Http\Request;

class CartaoController extends Controller
{
    public function index()
    {
        $cartoes = Cartao::all();
        return view('cartao.index', compact('cartoes'));
    }

    public function create()
    {

        $ultimoCartao = Cartao::latest()->first();


        return view('cartao.create', compact('ultimoCartao'));
    }


    public function etapa4()
    {
        $cartao = Cartao::latest()->first();

        if (!$cartao) {
            return redirect()->route('cartao.index')->with('error', 'Nenhum cartão encontrado');
        }

        return view('cartao.etapa4', compact('cartao'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'renda_mensal' => 'required|numeric',
            'email' => 'required|email',
            'tipo_cartao' => 'required',
            'consentimento' => 'accepted',
        ]);

        $cartao = new Cartao();
        $cartao->nome = $request->nome;
        $cartao->cpf = $request->cpf;
        $cartao->renda_mensal = $request->renda_mensal;
        $cartao->email = $request->email;
        $cartao->tipo_cartao = $request->tipo_cartao;
        $cartao->status = 'Pendente';
        $cartao->limite = $this->calcularLimite($request->renda_mensal);
        $cartao->renda_minima = $this->calcularRendaMinima($cartao->limite);
        $cartao->save();

        $cartao->aprovado = $this->verificarAprovacao($cartao);
        $cartao->save();

        return redirect()->route('cartao.etapa4', ['cartaoId' => $cartao->id]);
    }

    public function edit($id)
    {
        $cartao = Cartao::findOrFail($id);
        return view('cartao.edit', compact('cartao'));
    }

    public function listarEtapa4($cartaoId)
    {
        $cartao = Cartao::findOrFail($cartaoId);
        return view('cartao.etapa4', compact('cartao'));
    }

    public function update(Request $request, $id)
    {
        $cartao = Cartao::findOrFail($id);

        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'renda_mensal' => 'required|numeric',
            'email' => 'required|email',
            'tipo_cartao' => 'required',
        ]);

        $cartao->update($request->all());
        return redirect()->route('cartao.index');
    }

    public function destroy($id)
    {
        $cartao = Cartao::findOrFail($id);
        $cartao->delete();
        return redirect()->route('cartao.index');
    }

    public function showEtapa3($id)
    {
        $cartao = Cartao::find($id);
        return view('cartao.etapa3', compact('cartao'));
    }

    public function etapa3($cartaoId)
    {
        $cartao = Cartao::findOrFail($cartaoId);
        $aprovado = $cartao->renda_mensal >= 3500;
        return view('cartao.etapa3', compact('cartao', 'aprovado'));
    }

    public function show($id)
    {
        $cartao = Cartao::findOrFail($id);
        return view('cartao.show', compact('cartao'));
    }

    private function verificarAprovacao($cartao)
    {
        if ($cartao->limite >= 1000 && $cartao->renda_mensal >= 2000) {
            return true;
        }
        return false;
    }

    private function calcularLimite($renda_mensal)
    {
        if ($renda_mensal >= 35000) {
            return 30000;
        } elseif ($renda_mensal >= 17000) {
            return 15000;
        } elseif ($renda_mensal >= 12000) {
            return 10000;
        } elseif ($renda_mensal >= 3200) {
            return 3000;
        } elseif ($renda_mensal >= 1200) {
            return 1000;
        } elseif ($renda_mensal >= 600) {
            return 500;
        }
        return 0;
    }

    private function calcularRendaMinima($limite)
    {
        switch ($limite) {
            case 30000:
                return 35000;
            case 15000:
                return 17000;
            case 10000:
                return 12000;
            case 3000:
                return 3200;
            case 1000:
                return 1200;
            case 500:
                return 600;
            default:
                return 0;
        }
    }
}
