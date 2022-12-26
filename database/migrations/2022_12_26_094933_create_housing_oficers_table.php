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
        Schema::create('housing_oficers', function (Blueprint $table) {
            $table->id();
            $table->string('military_rank');
            $table->string('fio');
            $table->string('institution');
            $table->integer('room');
            $table->string('married');
            $table->integer('children')->default(0);
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
        Schema::dropIfExists('housing_oficers');
    }
};
