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
        Schema::table('sales', function (Blueprint $table) {
            $table->string('company_name')->nullable();
            $table->string('street_1')->nullable();
            $table->string('street_2')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('website_link')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('title')->nullable();
            $table->string('job_postion')->nullable();
            $table->string('mobile')->nullable();
            $table->string('tag')->nullable();
            $table->string('sales_person')->nullable();
            $table->string('campaign_id')->nullable();
            $table->string('medium_id')->nullable();
            $table->string('source_id')->nullable();
            $table->string('referred_by')->nullable();
            $table->longText('description')->nullable();
            $table->string('is_lost')->nullable()->comment('Lost -> 1 , No Lost -> 0');
            $table->string('lost_reason')->nullable();
            $table->longText('closing_note')->nullable();
            $table->string('days_to_assign')->nullable();
            $table->string('days_to_close')->nullable();
            $table->string('recurring_revenue')->nullable();
            $table->string('recurring_plan')->nullable();
            $table->string('sales')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('company_name');
            $table->dropColumn('street_1');
            $table->dropColumn('street_2');
            $table->dropColumn('city');
            $table->dropColumn('zip');
            $table->dropColumn('state');
            $table->dropColumn('country');
            $table->dropColumn('website_link');
            $table->dropColumn('contact_name');
            $table->dropColumn('title');
            $table->dropColumn('job_postion');
            $table->dropColumn('mobile');
            $table->dropColumn('tag');
            $table->dropColumn('sales_person');
            $table->dropColumn('campaign_id');
            $table->dropColumn('medium_id');
            $table->dropColumn('source_id');
            $table->dropColumn('referred_by');
            $table->dropColumn('description');
            $table->dropColumn('is_lost');
            $table->dropColumn('lost_reason');
            $table->dropColumn('closing_note');
            $table->dropColumn('days_to_assign');
            $table->dropColumn('days_to_close');        
            $table->dropColumn('recurring_revenue');        
            $table->dropColumn('recurring_plan'); 
            $table->dropColumn('sales');
        });
    }
};
