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
            $table->string('lead_type')->nullable()->comment('generate 1 and by lead 2')->after('probability');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('generate_lead', function (Blueprint $table) {
            //
        });
    }
};
