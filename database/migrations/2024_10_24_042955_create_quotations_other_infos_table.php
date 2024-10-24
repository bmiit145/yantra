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
        Schema::create('quotations_other_infos', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_id')->nullable();
            $table->string('sales_person')->nullable();
            $table->string('sales_team')->nullable();
            $table->string('online_signature')->nullable()->comment('1 is yes, 0 is no');
            $table->string('online_payment')->nullable()->comment('1 is yes, 0 is no');
            $table->string('online_payment_pr')->nullable()->comment('ex 20%');
            $table->string('customer_ref')->nullable();
            $table->string('tag_id')->nullable();
            $table->string('fiscal_position')->nullable();
            $table->string('analytic_account')->nullable();
            $table->string('incoterm')->nullable();
            $table->string('incoterm_location')->nullable();
            $table->string('shipping_policy')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('source_document')->nullable();
            $table->string('opportunity_id')->nullable();
            $table->string('campaign_id')->nullable();
            $table->string('medium_id')->nullable();
            $table->string('source_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations_other_infos');
    }
};
