<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaronaProcura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carona_procura', function (Blueprint $table) {
            $table->unsignedBigInteger('carona');
            $table->unsignedBigInteger('usuario');


            $table->primary(['carona', 'usuario']);

            $table->foreign('carona')
                ->references('id')->on('caronas');

            $table->foreign('usuario')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carona_procura');
    }
}
