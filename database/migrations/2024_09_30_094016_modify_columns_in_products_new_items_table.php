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
        Schema::table('products_new_items', function (Blueprint $table) {
            $table->string('sales_tax_id')->change();
            $table->string('category_id')->change();
            $table->string('tags_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products_new_items', function (Blueprint $table) {
            $table->bigInteger('sales_tax_id')->change();
            $table->bigInteger('category_id')->change();
            $table->bigInteger('tags_id')->change();
        });
    }
};
