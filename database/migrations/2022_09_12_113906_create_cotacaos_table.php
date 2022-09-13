<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresa')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('produto_id')->nullable();
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade')->onUpdate('cascade');
            $table->string('designacao')->nullable();
            $table->decimal('quantidade', 20,2)->nullable();
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
        Schema::dropIfExists('cotacao');
    }
}
