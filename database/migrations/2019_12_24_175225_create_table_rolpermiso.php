<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRolpermiso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolPermiso', function (Blueprint $table) {
            $table->unsignedInteger('idPermiso');
            $table->unsignedInteger('idRol');
            $table->timestamps();
            
            $table->foreign('idRol')->references('id')->on('rol')->onDelete('cascade');
            $table->foreign('idPermiso')->references('id')->on('permiso')->onDelete('cascade');
        
            $table->primary(['idRol','idPermiso']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolPermiso');
    }
}
