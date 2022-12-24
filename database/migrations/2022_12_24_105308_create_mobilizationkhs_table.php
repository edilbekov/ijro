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
        Schema::create('mobilizationkhs', function (Blueprint $table) {
            $table->id();
            $table->string('mib_name');
            $table->string('fio');
            $table->double('sum');
            $table->date('date');
            $table->double('month_percent');
            $table->double('initial_sum');
            $table->double('residual');
            $table->double('done');
            $table->double('6.12');
            $table->integer('naryad');
            $table->integer('full_paid');
            $table->integer('partially_paid');
            $table->integer('no_paid');
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
        Schema::dropIfExists('mobilizationkhs');
    }
};
