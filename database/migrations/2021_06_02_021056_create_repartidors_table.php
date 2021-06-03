<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepartidorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repartidors', function (Blueprint $table) {
            $table->id('repartidor_id');
            $table->string('nombre');
            $table->string('apellido_pa');
            $table->string('apellido_ma');
            $table->string('edad');
            $table->string('vehiculo');
            $table->string('pago');
            $table->text('foto_repartidor');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('ubicacion_id')->references('ubicacion_id')->on('ubicaciones');
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
        Schema::dropIfExists('repartidors');
    }
}
