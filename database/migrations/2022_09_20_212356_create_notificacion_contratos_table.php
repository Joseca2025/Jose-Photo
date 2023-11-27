<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacion_contratos', function (Blueprint $table) {
            $table->id();
            $table->string('estado')->nullable();
            $table->unsignedBigInteger('idorganizador')->nullable()->foreign('idorganizador')->references('id')->on('organizadors')->onDelete('set null');
            $table->unsignedBigInteger('idfotografo')->nullable()->foreign('idfotografo')->references('id')->on('fotografos')->onDelete('set null');
            $table->unsignedBigInteger('idevento')->nullable()->foreign('idevento')->references('id')->on('eventos')->onDelete('set null');
            $table->unsignedBigInteger('idpaquete_foto')->nullable()->foreign('idpaquete_foto')->references('id')->on('paquete_fotos')->onDelete('set null');
            $table->unsignedBigInteger('idaceptado')->nullable()->foreign('idaceptado')->references('id')->on('fotografos')->onDelete('set null');
            
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
        Schema::dropIfExists('notificacion_contratos');
    }
}
