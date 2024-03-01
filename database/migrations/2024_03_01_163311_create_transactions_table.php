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
            $table->enum('type', ['gros', 'details']);
            $table->integer('quantity');
            $table->decimal('prix_achat_par_casier', 10, 4);
            $table->decimal('prix_vente_par_casier', 10, 4);
            $table->decimal('prix_achat_par_bouteille', 10, 4);
            $table->decimal('prix_vente_par_bouteille', 10, 4);
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
