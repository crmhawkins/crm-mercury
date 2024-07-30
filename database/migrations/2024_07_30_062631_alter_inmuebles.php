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
        //change type of descripcion to TEXT    
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->text('descripcion')->change();
            //añadir tipo de inmueble como string
            $table->string('tipo_inmueble')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //change type of descripcion to VARCHAR
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->string('descripcion')->change();
            //eliminar tipo de inmueble como string
            $table->dropColumn('tipo_inmueble');
        });
    }
};
