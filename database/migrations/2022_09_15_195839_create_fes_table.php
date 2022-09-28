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
        Schema::create('fes', function (Blueprint $table) {
            $table->id();
            $table->string('site_id')->nullable();
            $table->string('DT')->nullable();
            $table->string('SSV2G')->nullable();
            $table->string('SSV3G')->nullable();
            $table->string('picture')->nullable();
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
        Schema::dropIfExists('fes');
    }
};
