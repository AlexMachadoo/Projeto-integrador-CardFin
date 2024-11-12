<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'data_emprestimo',
        'parcelas',
        'tipo_credito',
        'numero_parcela',
    ];

    public $timestamps = true;
}
