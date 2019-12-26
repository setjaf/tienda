<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePedidoProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidoProveedor', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idTienda');
            $table->unsignedInteger('idUsuario');
            $table->unsignedInteger('idProveedor');
            $table->date('fechaPedido');
            $table->boolean('visita')->default(false);
            $table->date('fechaVisita')->nullable();
            $table->float('importe')->default(0.00);
            $table->float('pagado')->nullable();
            $table->timestamps();
            
            $table->foreign('idTienda')->references('id')->on('tienda')->onDelete('cascade');
            $table->foreign('idUsuario')->references('id')->on('usuario')->onDelete('cascade');
            $table->foreign('idProveedor')->references('id')->on('proveedor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidoProveedor');
    }
}
