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
        Schema::create('vaga', function (Blueprint $table) {
            $table->id();         
            $table->varchar('nome',255)->nullable(false);
            $table->varchar('cargo',255)->nullable(false);
            $table->varchar('contato',255)->nullable(false);
            $table->varchar('formacao',255)->nullable(false);
            $table->char('cnpj',14)->nullable(false);
            $table->text('descricao',14)->nullable(false);
            $table->boolean('aprovado')->default(false);
            $table->varchar('ramo',255)->nullable(false);
            $table->foreign('CNPJ')->references('CNPJ')->on('empresas');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaga');
    }
};
