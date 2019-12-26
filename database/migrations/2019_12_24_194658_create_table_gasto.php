<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGasto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idTienda');
            $table->unsignedInteger('idUsuario');
            $table->float('importe');
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('idTienda')->references('id')->on('tienda')->onDelete('cascade');
            $table->foreign('idUsuario')->references('id')->on('usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gasto');
    }
}
