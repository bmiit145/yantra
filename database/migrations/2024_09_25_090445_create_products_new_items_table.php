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
        Schema::create('products_new_items', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('image')->nullable();
            $table->string('product_type')->nullable();
            $table->string('track_inventory')->nullable();
            $table->string('create on order')->nullable();
            $table->string('invoicing_policy')->nullable();
            $table->string('plan_servies')->nullable();
            $table->string('sales_price')->nullable();
            $table->string('cost_price')->nullable();
            $table->string('reference')->nullable();
            $table->string('barcode')->nullable();
            $table->string('hsn_sac_code')->nullable();
            $table->longtext('internal_note')->nullable();
            $table->string('optional_product')->nullable();
            $table->longtext('sales_des')->nullable();
            $table->string('manufacture')->nullable();
            $table->string('weight')->nullable();
            $table->string('volume')->nullable();
            $table->string('customer_lead_time')->nullable();
            $table->longtext('res_des')->nullable();
            $table->longtext('del_des')->nullable();
            $table->string('income_ac')->nullable();
            $table->string('expense_ac')->nullable();
             // Add new columns after the third column
             $table->unsignedBigInteger('sales_tax_id')->nullable()->after('product_type');
             $table->json('purchase_taxes')->nullable()->after('sales_tax_id');
             $table->unsignedBigInteger('category_id')->nullable()->after('purchase_taxes');
             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_new_items');
    }
};
