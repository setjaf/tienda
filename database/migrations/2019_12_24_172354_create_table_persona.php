<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->charset('utf8');
            $table->string('apPaterno')->charset('utf8');
            $table->string('apMaterno')->charset('utf8');
            $table->date('fechaNacimiento');
            $table->char('curp',18)->unique()->nullable(false);
            $table->char('rfc',13)->unique()->nullable(false);
            $table->char('telefono',13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
