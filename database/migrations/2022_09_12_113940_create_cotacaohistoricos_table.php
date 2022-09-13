<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotacaohistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacaohistorico', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('tipo_id')->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipo')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('cotacaohistorico');
    }
}
