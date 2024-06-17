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
        //change nullable column nombre, apellido, direccion, busqueda
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('nombre')->nullable()->change();
            $table->string('apellido')->nullable()->change();
            $table->string('direccion')->nullable()->change();
            $table->string('busqueda')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //change not nullable column nombre, apellido, direccion, busqueda
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('nombre')->nullable(false)->change();
            $table->string('apellido')->nullable(false)->change();
            $table->string('direccion')->nullable(false)->change();
            $table->string('busqueda')->nullable(false)->change();
        });
    }
};
