<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('banco_id')->nullable();
            $table->foreign('banco_id')->references('id')->on('banco')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nome')->nullable();
            $table->string('endereco')->nullable();
            $table->string('telefone')->nullable();
            $table->string('nuit')->nullable();
            $table->string('estado')->default('on');
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
        Schema::dropIfExists('empresa');
    }
}
