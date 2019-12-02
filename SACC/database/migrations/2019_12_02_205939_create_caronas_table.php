<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaronasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caronas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data');
            $table->string('local');
            $table->integer('duracao');
            $table->time('horario');

            $table->unsignedBigInteger('carro');
            $table->unsignedBigInteger('oferece');

            $table->foreign('carro')
                ->references('id')->on('carros')
                ->onDelete('cascade');

            $table->foreign('oferece')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caronas');
    }
}
