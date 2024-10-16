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
            $table->unsignedBigInteger('sales_tax_id')->nullable()->after('income_ac');
            $table->string('purchase_taxes')->nullable()->after('sales_tax_id');
            $table->unsignedBigInteger('category_id')->nullable()->after('purchase_taxes');
            $table->unsignedBigInteger('tags_id')->nullable()->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products_new_items', function (Blueprint $table) {
            $table->dropColumn(['sales_tax_id', 'purchase_taxes', 'category_id', 'tags_id']);
        });
    }
};
