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
            $table->string('id',13)->unique()->primary();
            $table->string('producto');
            $table->string('imagen_url')->nullable(true);
            $table->unsignedInteger('idCategoria');
            $table->unsignedInteger('idMarca');
            $table->enum('unidadMedida', ['mL', 'g', 'u']);
            $table->enum('formaVenta', ['granel', 'pieza']);
            $table->float('tamano')->default(0.00);
            $table->boolean('verificado')->default(false);
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
