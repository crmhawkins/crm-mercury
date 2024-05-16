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
        //add to inmuebles column Direccion y localidad
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->string('direccion');
            $table->string('localidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop to inmuebles column Direccion y localidad
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->dropColumn('direccion');
            $table->dropColumn('localidad');
        });
    }
};
