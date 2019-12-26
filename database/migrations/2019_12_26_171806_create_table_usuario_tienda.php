<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsuarioTienda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioTienda', function (Blueprint $table) {
            $table->unsignedInteger('idTienda');
            $table->unsignedInteger('idUsuario');
            $table->timestamps();

            $table->primary(['idTienda','idUsuario']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarioTienda');
    }
}
