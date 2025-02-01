<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('inscricao', function (Blueprint $table) {
            $table->increments('id');
            $table->char('cpf', 11)->nullable(false);
            $table->unsignedInteger('vagaid')->nullable(false);
            $table->timestamp('datainscricao')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('cpf')->references('CPF')->on('usuarios');
            $table->foreign('vagaid')->references('id')->on('vaga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscricao');
    }
};
