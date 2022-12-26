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
        Schema::create('contract_clothes', function (Blueprint $table) {
            $table->id();
            $table->string('harbiy_qismlar');
            $table->integer('quloqchin_telpak');
            $table->integer('qishki_kurtka');
            $table->integer('yozgi_kostyum');
            $table->integer('ichki_kiyim');
            $table->integer('botinka');
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
        Schema::dropIfExists('contract_clothes');
    }
};
