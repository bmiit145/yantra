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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('gst_treatment')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('pricelist_id')->nullable();
            $table->string('Payment_terms')->nullable();
            $table->string('order_date')->nullable();
            $table->string('is_confirm')->default(0)->comment('1 is confirm, 0 is not confirm');
            $table->string('is_cancel')->default(0)->comment('1 is cancel, 0 is not cancel');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
