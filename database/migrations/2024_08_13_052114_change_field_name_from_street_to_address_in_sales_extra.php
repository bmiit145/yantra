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
        Schema::table('crm_sale_extra', function (Blueprint $table) {
            $table->renameColumn('street1', 'address_1');
            $table->renameColumn('street2', 'address_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crm_sale_extra', function (Blueprint $table) {
            $table->renameColumn('address_1', 'street1');
            $table->renameColumn('address_2', 'street2');
        });
    }
};
