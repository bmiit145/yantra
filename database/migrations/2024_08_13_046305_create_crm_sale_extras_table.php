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
        Schema::create('crm_sale_extra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');
            $table->string('company_name')->nullable();
            $table->string('contact_name')->nullable();
            $table->unsignedBigInteger('person_title')->nullable();
            $table->string('job_position')->nullable();
            $table->string('mobile')->nullable();

            // address fields
            $table->string('street1')->nullable();
            $table->string('street2')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();

            // website
            $table->string('website')->nullable();


            // marketing field as campaign , source , medium
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->unsignedBigInteger('source_id')->nullable();
            $table->unsignedBigInteger('medium_id')->nullable();

            // reference field
            $table->string('referred_by')->nullable();

            // sale_team field
            $table->unsignedBigInteger('sale_team_id')->nullable();

            $table->timestamps();



            // foreign keys
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('person_title')->references('id')->on('person_titles')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('set null');
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('set null');
            $table->foreign('medium_id')->references('id')->on('mediums')->onDelete('set null');
            $table->foreign('sale_team_id')->references('id')->on('sale_teams')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_sale_extra');
    }
};
