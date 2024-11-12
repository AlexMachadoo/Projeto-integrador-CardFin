<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('emprestimos', function (Blueprint $table) {
        $table->id();
        $table->decimal('juros', 8, 2)->nullable();
        $table->decimal('valor', 10, 2);
        $table->date('data_emprestimo');
        $table->integer('numero_parcelas'); 
        $table->enum('tipo_credito', ['pessoal', 'imobiliario']);
        $table->integer('numero_parcela')->default(1); 
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
