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
        Schema::create('ticket', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser') //reference the column on this table correctly
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->enum('tipe', ['fontaneria', 'electricidad', 'limpieza', 'pintura', 'ascensores', 'cristal', 'albañil', 'conserje']);
            $table->string('description');
            $table->enum('status', ['abierta', 'en curso','cerrada']);
            $table->date('dateIni');
            $table->date('dateEnd')->nullable();
            $table->string('bill')->nullable();
            $table->string('firma')->nullable();

            $table->string('photo')->nullable();
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
        Schema::dropIfExists('ticket');
    }
};
