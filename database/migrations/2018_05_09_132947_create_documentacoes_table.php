<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('arquivo');
            $table->string('video');
            $table->unsignedInteger('sistemas_id');
            $table->foreign('sistemas_id')->references('id')->on('sistemas');
            $table->unsignedInteger('tipo_documentacoes_id');
            $table->foreign('tipo_documentacoes_id')->references('id')->on('tipo_documentacoes');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');
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
        Schema::dropIfExists('documentacoes');
    }
}
