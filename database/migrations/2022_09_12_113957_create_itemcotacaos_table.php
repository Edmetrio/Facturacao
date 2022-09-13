<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemcotacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemcotacao', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('cotacaohistorico_id')->nullable();
            $table->foreign('cotacaohistorico_id')->references('id')->on('cotacaohistorico')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('itemcotacao');
    }
}
