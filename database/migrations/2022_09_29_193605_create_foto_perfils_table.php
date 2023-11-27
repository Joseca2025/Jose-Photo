<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoPerfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_perfils', function (Blueprint $table) {
            $table->id();
            $table->string('ruta')->nullable();
            $table->string('posicion')->nullable();
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
        Schema::dropIfExists('foto_perfils');
    }
}
