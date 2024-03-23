<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // mendefinisikan perubahan yang ingin diterapkan pada struktur database
    {
        Schema::create('calculation_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('number1');
            $table->string('operator');
            $table->integer('number2');
            $table->float('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // mendefinisikan cara untuk membatalkan perubahan yang didefinisikan dalam metode
    {
        Schema::dropIfExists('calculation_histories');
    }
};
