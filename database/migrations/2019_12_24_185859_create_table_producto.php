<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('producto');
            $table->unsignedInteger('idCategoria');
            $table->unsignedInteger('idMarca');
            $table->enum('unidadMedida', ['L', 'Kg', 'Pz']);
            $table->enum('tipoVenta', ['granel', 'pieza']);
            $table->float('tamano')->default(0.00);
            $table->timestamps();

            $table->foreign('idCategoria')->references('id')->on('categoria')->onDelete('cascade');
            $table->foreign('idMarca')->references('id')->on('marca')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
