<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetallePedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallePedido', function (Blueprint $table) {
            $table->unsignedInteger('idPedidoProveedor');
            $table->string('idProducto',13);
            $table->float('precio');
            $table->float('unidades');
            $table->float('total');
            $table->timestamps();

            $table->foreign('idPedidoProveedor')->references('id')->on('pedidoProveedor')->onDelete('cascade');
            $table->foreign('idProducto')->references('id')->on('producto')->onDelete('cascade');
            $table->primary(['idPedidoProveedor','idProducto']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallePedido');
    }
}
