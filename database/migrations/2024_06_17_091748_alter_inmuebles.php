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
        //change column direccion and localidad nullable
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->string('direccion')->nullable()->change();
            $table->string('localidad')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //change column direccion and localidad not nullable
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->string('direccion')->nullable(false)->change();
            $table->string('localidad')->nullable(false)->change();
        });
    }   
};
