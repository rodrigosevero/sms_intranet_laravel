<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadeSaudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidade_saudes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('endereco')->nullable();
            $table->string('telefone')->nullable();
            $table->string('foto')->nullable();
            $table->decimal('latitude', 10,6)->nullable();
            $table->decimal('longitude', 10,6)->nullable();
            $table->unsignedInteger('tipounidade_id');
            $table->foreign('tipounidade_id')->references('id')->on('tipo_unidades');
            $table->unsignedInteger('regionalunidade_id');
            $table->foreign('regionalunidade_id')->references('id')->on('regional_unidades');
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
        Schema::dropIfExists('unidade_saudes');
    }
}
