<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idProducto',13);
            $table->unsignedInteger('idTienda');
            $table->float('cantidadDisponible')->default(0.00);
            $table->float('cantidadDeseada')->default(0.00);
            $table->float('precioVenta')->default(0.00);
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->foreign('idProducto')->references('id')->on('producto')->onDelete('cascade');
            $table->foreign('idTienda')->references('id')->on('tienda')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
