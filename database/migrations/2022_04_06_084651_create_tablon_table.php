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
        Schema::create('tablon', function (Blueprint $table) {
            $table->id();
            $table->string("anuncio");
            $table->string('date')->default('00-00-00');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser') //reference the column on this table correctly
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('tablon');
    }

};
