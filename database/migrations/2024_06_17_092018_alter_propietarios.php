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
        //change nullable nombre, apellidos and dni
        Schema::table('propietarios', function (Blueprint $table) {
            $table->string('nombre')->nullable()->change();
            $table->string('apellidos')->nullable()->change();
            $table->string('dni')->nullable()->change();

        });
           


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //change not nullable nombre, apellidos and dni
        Schema::table('propietarios', function (Blueprint $table) {
            $table->string('nombre')->nullable(false)->change();
            $table->string('apellidos')->nullable(false)->change();
            $table->string('dni')->nullable(false)->change();
        });
    }
};
