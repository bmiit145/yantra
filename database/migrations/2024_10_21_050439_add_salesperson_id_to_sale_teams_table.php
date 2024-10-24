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
            $table->string('salesperson_id')->nullable()->after('invoicing_target'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_teams', function (Blueprint $table) {
            $table->dropColumn('salesperson_id'); 
        });
    }
};
