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
        Schema::dropIfExists('leads');
        Schema::create('generate_lead', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('probability')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('website_link')->nullable();
            $table->string('sales_person')->nullable();
            $table->string('sales_team')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('title')->nullable();
            $table->string('email')->nullable();
            $table->string('job_postion')->nullable();      
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('tag_id')->nullable();
            $table->string('priority')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generate_lead');
    }
};
