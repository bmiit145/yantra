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
        Schema::create('price_list_pops', function (Blueprint $table) {
            $table->id();
            $table->string('apply_to')->nullable();
            $table->string('product_Name')->nullable();
            $table->string('category')->nullable();
            $table->string('price_type')->nullable();
            $table->string('discount')->nullable();
            $table->string('sale_price_name')->nullable();
            $table->string('based_price')->nullable();
            $table->string('discount_sales')->nullable();
            $table->string('markup')->nullable();
            $table->string('other_pricelist')->nullable();
            $table->string('round_of_to')->nullable();
            $table->string('extra_fee')->nullable();
            $table->string('fixed_price')->nullable();
            $table->string('min_oty')->nullable();
            $table->string('strat_date')->nullable();
            $table->string('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_list_pops');
    }
};
