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
        Schema::create('enlace_etiqueta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idenlace');
            $table->foreign('idenlace')->references('id')->on('enlace');
            $table->foreignId('idetiqueta');
            $table->foreign('idetiqueta')->references('id')->on('etiqueta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enlace_etiqueta');
    }
};
