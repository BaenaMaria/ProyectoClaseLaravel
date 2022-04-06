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
        Schema::create('operario', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->integer('phone');
            $table->string('email')->unique();
            $table->enum('tipe', ['fontaneria', 'electricidad', 'limpieza', 'pintura', 'ascensores', 'cristal', 'albañil', 'conserje']);

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
        Schema::dropIfExists('operario');
    }
};
