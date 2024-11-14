<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Emprestimo;
use App\Models\Cartao;

class UserProfileController extends Controller
{
    public function show()
{
    $user = Auth::user();

    $ultimoEmprestimo = Emprestimo::where('id', $user->id)->latest()->first();
    $ultimoCartao = Cartao::where('id', $user->name)->latest()->first();

    if (!$ultimoEmprestimo) {
        $ultimoEmprestimo = null;
    }
    if (!$ultimoCartao) {
        $ultimoCartao = null;
    }

    return view('user_profile.user-profile', compact('user', 'ultimoEmprestimo', 'ultimoCartao'));
}
public function etapa3($cartaoId)
{
    $cartao = Cartao::findOrFail($cartaoId);
    return view('cartao.etapa3', compact('cartao'));
}
}