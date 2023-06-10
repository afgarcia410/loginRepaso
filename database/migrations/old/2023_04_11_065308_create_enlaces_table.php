<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enlace', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('iduser');
            // $table->string('titulo');
            // $table->string('descripcion');
            // $table->string('enlace');
            // $table->string('imagen');
            // $table->increments('visitas');
            $table->foreignId('iduser');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('enlace');
            $table->string('imagen');
            $table->unsignedBigInteger('visitas');
            $table->timestamps();
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enlace');
    }
};
