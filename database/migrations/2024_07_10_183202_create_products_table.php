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
            $table->string('name_es')->nullable();
            $table->string('name_en')->nullable();
            $table->string('price')->nullable();
            $table->text('description_es')->nullable();
            $table->text('description_en')->nullable();
            $table->string('image')->default('defult-product.png');
            $table->foreignId('category_id')->constrained('categories' , 'id')->cascadeOnDelete();
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
