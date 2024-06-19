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
            $table->enum('type', ['gros', 'details']);
            $table->integer('entrees')->nullable();
            $table->integer('sorties')->nullable();
            $table->integer('stock_initial')->nullable();
            $table->integer('stock_final')->nullable();
            $table->integer('quantity');
            $table->decimal('purchase_price_per_locker', 10, 4);
            $table->decimal('sale_price_per_locker', 10, 4);
            $table->decimal('purchase_price_per_bottle', 10, 4);
            $table->decimal('selling_price_per_bottle', 10, 4);
            $table->date('date_op');
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
