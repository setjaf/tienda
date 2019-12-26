<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTienda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tienda', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idUsuario');
            $table->string('nombre')->charset('utf8');
            $table->string('calle');
            $table->string('numero');
            $table->char('cp', 5);
            $table->float('balance')->default(0.00);
            $table->timestamps();
            
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
        Schema::dropIfExists('tienda');
    }
}
