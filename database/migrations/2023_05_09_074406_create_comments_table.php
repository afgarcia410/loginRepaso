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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('orden_id')->nullable();
            $table->text('comment');
            $table->unsignedBigInteger('approve')->nullable();
            $table->timestamps();
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('enlace')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
