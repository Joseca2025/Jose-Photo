<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarjetaCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjeta_creditos', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique()->nullable();
            $table->string('fecha')->nullable();
            $table->string('cvc')->nullable();
            $table->unsignedBigInteger('iduser')->nullable()->foreign('iduser')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('tarjeta_creditos');
    }
}
