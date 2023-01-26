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
        Schema::create('rectifiers', function (Blueprint $table) {
            $table->id();
            $table->string('oid_name')->unique();
            $table->string('site_name');
            $table->string('rtpo');
            $table->string('nsa');
            $table->string('type');
            $table->string('ip_recti');
            $table->string('community');
            $table->integer('version');
            $table->integer('port');
            $table->string('oid_voltage');
            $table->string('oid_temp');
            $table->string('oid_current');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rectifiers');
    }
};
