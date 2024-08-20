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
        //add column reference number
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->string('reference_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop column reference number
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->dropColumn('reference_number');
        });
    }
};
