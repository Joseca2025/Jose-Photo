<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprafotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprafotos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser')->nullable()->foreign('iduser')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('idfotografia')->nullable()->foreign('idfotografia')->references('id')->on('fotografias')->onDelete('set null');
            $table->unsignedBigInteger('idevento')->nullable()->foreign('idevento')->references('id')->on('eventos')->onDelete('set null');
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
        Schema::dropIfExists('comprafotos');
    }
}
