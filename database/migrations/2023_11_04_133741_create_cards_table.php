<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('transport_id');
            $table->string('card_number');
            $table->timestamps();

          
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('transport_id')->references('id')->on('transports');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        

        Schema::table('cards', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
};
