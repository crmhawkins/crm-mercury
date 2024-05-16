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
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('user_department_id')->unsigned();
            // $table->bigInteger('user_position_id')->unsigned();
            $table->string('nombre_completo')->nullable();
            $table->string('dni')->unique();
            $table->string('role')->nullable();
            $table->boolean('inmobiliaria')->nullable();
            $table->string('ubicacion')->nullable();;
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('inactive');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('user_department_id')->references('id')->on('departments');
            // $table->foreign('user_position_id')->references('id')->on('positions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
