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
        //add column to table propietarios telefono y correo
        Schema::table('propietarios', function (Blueprint $table) {
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop
        Schema::table('propietarios', function (Blueprint $table) {
            $table->dropColumn('telefono');
            $table->dropColumn('correo');
        });
    }
};
