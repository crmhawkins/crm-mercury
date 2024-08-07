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
        //add daily_rental_price to inmuebles
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->string('daily_rental_price')->nullable();
            //change colunm price to string
            $table->string('precio_venta')->change();
            //change alquiler_semana to string
            $table->string('alquiler_semana')->change();
            //change alquiler_mes to string
            $table->string('alquiler_mes')->change();
            //ibi to string
            $table->string('ibi')->change();
            //coste_basura to string
            $table->string('coste_basura')->change();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop daily_rental_price from inmuebles
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->dropColumn('daily_rental_price');
            
        });
    }
};
