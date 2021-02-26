<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramosUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramos_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tramo_id')->references('id')->on('tramos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->date('fecha_actividad');
            $table->date('fecha_reserva');
            $table->rememberToken();
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
        Schema::dropIfExists('tramos_usuario');
    }
}
