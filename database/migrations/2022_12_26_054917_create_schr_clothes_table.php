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
        Schema::create('schr_clothes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('measure');
            $table->integer('need');
            $table->integer('provided');            
            $table->string('providedpercent');
            $table->string('comment');
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
        Schema::dropIfExists('schr_clothes');
    }
};
