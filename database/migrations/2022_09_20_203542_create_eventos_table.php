<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->unsignedBigInteger('idorganizador')->nullable()->foreign('idorganizador')->references('id')->on('organizadors')->onDelete('set null');
            $table->unsignedBigInteger('idfotografo')->nullable()->foreign('idfotografo')->references('id')->on('fotografos')->onDelete('set null');
            $table->unsignedBigInteger('idqr')->nullable()->foreign('idqr')->references('id')->on('qrs')->onDelete('set null');
            $table->unsignedBigInteger('idcatalogo')->nullable()->foreign('idcatalogo')->references('id')->on('catalogos')->onDelete('set null');
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
        Schema::dropIfExists('eventos');
    }
}
