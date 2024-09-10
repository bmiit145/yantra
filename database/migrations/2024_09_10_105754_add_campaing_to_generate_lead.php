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
        Schema::table('generate_lead', function (Blueprint $table) {
            $table->string('campaign_id')->nullable();
            $table->string('medium_id')->nullable();
            $table->string('source_id')->nullable();
            $table->string('referred_by')->nullable();
            $table->string('assignment_date')->nullable();
            $table->string('closed_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('generate_lead', function (Blueprint $table) {
            $table->dropColumn('campaign_id');
            $table->dropColumn('medium_id');
            $table->dropColumn('source_id');
            $table->dropColumn('referred_by');
            $table->dropColumn('assignment_date');
            $table->dropColumn('closed_date');
        });
    }
};
