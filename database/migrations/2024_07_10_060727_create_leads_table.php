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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('product_pricing')->nullable();
            $table->string('probability')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('salesperson')->nullable();
            $table->string('sales_team')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('email')->nullable();
            $table->string('job_postition')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('tages')->nullable();
            $table->string('internal_notes')->nullable();
            $table->string('marketing_company')->nullable();
            $table->string('marketing_campaign')->nullable();
            $table->string('marketing_medium')->nullable();
            $table->string('marketing_source')->nullable();
            $table->string('marketing_referred_by')->nullable();
            $table->string('marketing_assigment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
