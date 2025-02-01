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
        Schema::create('administrador', function (Blueprint $table) {
            $table->char('cpf',11);
            $table->string('nome', length: 255);
            $table->char('telefone',11);
            $table->enum('TipoUsuario', ['comum', 'admin'])->default('admin')->nullable(false);

            $table->foreign('cpf')->references('CPF')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrador');
    }
};
