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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained();
            $table->string('description');
            $table->integer('quantite');
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
        Schema::dropIfExists('products');
    }
};
