<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration
{
    /**
     *  run the migrations.
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
          	
       
            $table->decimal('valor', 10, 2);
            $table->decimal('valor_parcela', 10, 2);
            $table->integer('numero_parcela');
            $table->date('data_emprestimo');
            $table->date('data_devolucao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
}