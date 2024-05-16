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
        //add nombre, apellido, Búsqueda, direccion 
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('busqueda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop nombre, apellido, Búsqueda, direccion
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('nombre');
            $table->dropColumn('apellido');
            $table->dropColumn('direccion');
            $table->dropColumn('busqueda');
        });

    }
};
