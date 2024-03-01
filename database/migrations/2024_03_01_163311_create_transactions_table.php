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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->enum('operation', ['entree', 'sortie']);
            $table->enum('type', ['big', 'details']);
            $table->integer('quantity');
            $table->decimal('purchase_price_per_locker', 10, 4);
            $table->decimal('sale_price_per_locker', 10, 4);
            $table->decimal('purchase_price_per_bottle', 10, 4);
            $table->decimal('selling_price_per_bottle', 10, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
