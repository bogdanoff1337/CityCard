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
        // Міграція для списувань
        Schema::create('debit_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id');
            $table->string('type')->default('списування');
            $table->decimal('price', 10, 2)->unsigned(); 
            $table->timestamps();
        
            
            $table->foreign('card_id')->references('id')->on('cards');
            $table->foreign('price')->references('price')->on('transports');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_history');
    }
};
