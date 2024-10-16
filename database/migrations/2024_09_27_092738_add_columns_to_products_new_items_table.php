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
        Schema::table('products_new_items', function (Blueprint $table) {
            $table->string('invoicing_policy_service_id')->nullable()->after('invoicing_policy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products_new_items', function (Blueprint $table) {
            $table->dropColumn(['invoicing_policy_service_id']);
        });
    }
};
