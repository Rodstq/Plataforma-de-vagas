<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->char('cpf', 11)->primary();
            $table->string('nome')->nullable(false);;
            $table->char('telefone', 11)->nullable(false);;
            $table->string('formacao')->nullable(false);;
            $table->enum('tipousuario', ['comum', 'admin'])->default('comum')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
