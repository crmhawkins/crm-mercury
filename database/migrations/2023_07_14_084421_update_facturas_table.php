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
        Schema::table('facturas', function (Blueprint $table) {
            //si no existe la columna fecha_vencimiento la crea
            if (!Schema::hasColumn('facturas', 'fecha_vencimiento')){
                $table->string("fecha_vencimiento")->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->dropColumn("fecha_vencimiento");
        });
    }
};
