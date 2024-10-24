<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('idEspecialidad');
            $table->tinyInteger('Trayecto');
            $table->tinyInteger('Estilo');
            $table->text('Nombre_UC');
            $table->smallInteger('Cantidad_UC');
            $table->smallInteger('HTA');
            $table->tinyInteger('Modalidad');
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
        Schema::dropIfExists('credits');
    }
}
