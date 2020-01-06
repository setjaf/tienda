<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idPersona');
            $table->unsignedInteger('idRol');
            $table->string('correo')->unique();
            $table->timestamp('correo_verified_at')->nullable();
            $table->string('contrasena');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('idPersona')->references('id')->on('persona')->onDelete('cascade');
            $table->foreign('idRol')->references('id')->on('rol')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
