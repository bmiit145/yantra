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
        Schema::table('sale_teams', function (Blueprint $table) {
            $table->string('team_leader')->nullable()->after('name');
            $table->string('sales_type')->nullable()->after('team_leader')->comment('1: pipeline , 2: leads');
            $table->string('email')->nullable()->after('sales_type');
            $table->string('accept_emails_from')->nullable()->after('email');
            $table->string('invoicing_target')->nullable()->after('accept_emails_from');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_teams', function (Blueprint $table) {
            //
        });
    }
};
