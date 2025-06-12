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
        $table->string('name');             // Product name
        $table->string('category');       // Product Category
        $table->text('description')->nullable(); // Optional long description
        $table->decimal('price', 8, 2);     // Price like 99999.99
        $table->string('image')->nullable(); // Image path (optional for now)
        $table->timestamps();               // Created_at and updated_at
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
