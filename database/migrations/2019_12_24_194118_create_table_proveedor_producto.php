<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProveedorProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedorProducto', function (Blueprint $table) {
            $table->unsignedInteger('idProveedor');
            $table->unsignedInteger('idProducto');
            $table->timestamps();

            $table->foreign('idProveedor')->references('id')->on('proveedor')->onDelete('cascade');
            $table->foreign('idProducto')->references('id')->on('producto')->onDelete('cascade');

            $table->primary(['idProveedor','idProducto']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedorProducto');
    }
}
