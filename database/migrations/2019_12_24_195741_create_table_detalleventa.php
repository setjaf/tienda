<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetalleventa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleVenta', function (Blueprint $table) {
            $table->unsignedInteger('idVenta');
            $table->unsignedInteger('idStock');
            $table->float('precioFinal');
            $table->float('precioVenta');
            $table->timestamps();

            $table->foreign('idVenta')->references('id')->on('venta')->onDelete('cascade');
            $table->foreign('idStock')->references('id')->on('stock')->onDelete('cascade');
            $table->primary(['idVenta','idStock']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalleVenta');
    }
}
