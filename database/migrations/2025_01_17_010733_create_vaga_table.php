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
            $table->increments('id');         
            $table->string('nome',length:255)->nullable(false);
            $table->string('cargo',length:255)->nullable(false);
            $table->string('contato',length:255)->nullable(false);
            $table->string('formacao',length:255)->nullable(false);
            $table->char('cnpj',14)->nullable(false);
            $table->text('descricao',14)->nullable(false);
            $table->boolean('aprovado')->default(false);
            $table->string('ramo',length:255)->nullable(false);
            $table->foreign('cnpj')->references('cnpj')->on('empresa');
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
