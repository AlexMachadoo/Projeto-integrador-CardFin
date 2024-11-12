<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    protected $table = 'cartoes';  

    protected $fillable = [
        'nome', 
        'cpf', 
        'renda_mensal', 
        'email', 
        'tipo_cartao', 
        'status', 
        'limite', 
        'renda_minima', 
        'aprovado'
    ];

    protected $casts = [
        'renda_mensal' => 'decimal:2',
        'limite' => 'decimal:2',
        'renda_minima' => 'decimal:2',
    ];
}
