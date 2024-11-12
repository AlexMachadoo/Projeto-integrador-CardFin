<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartoesTable extends Migration
{
    public function up()
    {
        Schema::create('cartoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->decimal('renda_mensal', 10, 2);
            $table->string('email');
            $table->enum('tipo_cartao', ['debito', 'debito/credito']);
            $table->decimal('limite', 10, 2);
            $table->decimal('renda_minima', 10, 2);
            $table->enum('status', ['Pendente', 'Aprovado', 'Recusado'])->default('Pendente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cartoes');
    }
}
