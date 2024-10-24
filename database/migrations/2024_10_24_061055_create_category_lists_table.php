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
        Schema::create('category_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('parent_category')->nullable();
            $table->string('force_removal')->nullable();
            $table->string('costing_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_lists');
    }
};
