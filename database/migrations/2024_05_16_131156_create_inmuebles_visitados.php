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
        //tabla que relaciona los inmuebles con los clientes

        Schema::create('inmuebles_visitados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('inmueble_id');
            $table->timestamps();

            //relaciones
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('inmueble_id')->references('id')->on('inmuebles');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmuebles_visitados');
    }
};
