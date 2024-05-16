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
        //en la tabla inmuebles añadimos un campo de tipo string llamado "tipo"
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->string('dormitorios')->nullable();
            $table->string('piscina')->nullable();
            $table->string('garaje')->nullable();
            //ibidecimal
            $table->decimal('ibi', 10, 2)->nullable();
            //coste_basura decimal
            $table->decimal('coste_basura', 10, 2)->nullable();
            //precio venta decimal
            $table->decimal('precio_venta', 10, 2)->nullable();
            //alquiler por semana
            $table->decimal('alquiler_semana', 10, 2)->nullable();
            //alquiler por mes
            $table->decimal('alquiler_mes', 10, 2)->nullable();
            
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //eliminamos el campo "tipo" de la tabla inmuebles
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->dropColumn('dormitorios');
            $table->dropColumn('piscina');
            $table->dropColumn('garaje');
            $table->dropColumn('ibi');
            $table->dropColumn('coste_basura');
            $table->dropColumn('precio_venta');
            $table->dropColumn('alquiler_semana');
            $table->dropColumn('alquiler_mes');
        });
    }
};
