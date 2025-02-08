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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('cpf_candidato'); // Ensure this column exists before creating FK
            $table->integer('vaga_id'); // Ensure this column exists before creating FK
            $table->foreign('cpf_candidato')->references('cpf')->on('usuarios');
            $table->foreign('vaga_id')->references('id')->on('vaga');
            $table->string('file_path'); // Store file path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
};
