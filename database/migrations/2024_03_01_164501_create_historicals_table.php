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
        Schema::create('historicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->decimal('old_price_purchase_per_bottle', 8, 2);
            $table->decimal('new_price_purchase_per_bottle', 8, 2);
            $table->decimal('old_price_sale_by_locker', 8, 2);
            $table->decimal('new_price_sale_by_locker', 8, 2);
            $table->timestamp('change_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historicals');
    }
};
