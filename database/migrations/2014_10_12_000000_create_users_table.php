<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone')->unique();
            // $table->timestamp('phone_verified_at')->nullable();            
            $table->string('password');
            $table->enum('role',['admin','employer']);
            $table->rememberToken();
            $table->timestamps();
        });
        User::create([
            'firstname'=>'Azizbek',
            'lastname'=>'Edilbekov',
            'phone'=>'+998907362044',
            'password'=>Hash::make('123'),            
        ]);
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
