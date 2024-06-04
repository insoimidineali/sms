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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('author_name')->nullable();
            $table->string('Description')->nullable();
            $table->string('Quantity')->nullable();
            $table->string('Book_image')->nullable();
             //ca veux dire que  si on delete un category, leur cle etranger va aussi delete
            $table->foreignId("category_id")->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
