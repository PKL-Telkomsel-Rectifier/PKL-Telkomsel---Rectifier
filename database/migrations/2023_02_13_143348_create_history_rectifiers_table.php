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
        Schema::create('history_rectifiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rectifier_id')->constrained('rectifiers')->onDelete('cascade');
            $table->string('old_name');
            $table->string('old_site_name');
            $table->string('old_rtpo');
            $table->string('old_nsa');
            $table->string('old_type');
            $table->string('old_ip_recti');
            $table->string('old_community');
            $table->integer('old_version');
            $table->integer('old_port');
            $table->string('old_oid_voltage');
            $table->string('old_oid_temp');
            $table->string('old_oid_current');
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
        Schema::dropIfExists('history_rectifiers');
    }
};
