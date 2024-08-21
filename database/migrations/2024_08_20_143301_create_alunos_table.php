<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',20)->unique();
            $table->string('nome',250);
            $table->string('email',200)->unique()->nullable();
            $table->string('celular',30)->nullable();
            $table->date('nascimento');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
