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
        Schema::create('quotations_order_lines', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('description')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('taxes')->nullable();
            $table->string('tax_excl')->nullable();
            $table->string('tax_incl')->nullable();
            $table->string('notes')->nullable();
            $table->string('order_type')->comment('1 is product, 2 is section, 3 is notes , 4 is catalog');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations_order_lines');
    }
};
