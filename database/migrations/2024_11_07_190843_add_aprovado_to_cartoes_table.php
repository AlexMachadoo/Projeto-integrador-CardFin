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
    Schema::table('cartoes', function (Blueprint $table) {
        $table->boolean('aprovado')->default(false);  // Por padrão, será "não aprovado"
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('cartoes', function (Blueprint $table) {
        $table->dropColumn('aprovado');
    });
}
};
