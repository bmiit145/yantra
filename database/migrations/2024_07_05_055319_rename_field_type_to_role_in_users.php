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
        Schema::table('users', function (Blueprint $table) {
            // remove field type
            $table->dropColumn('type');
            //add field role
            $table->string('role')->default('1')->comment('1:user, 2:admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // remove field role
            $table->dropColumn('role');
            //add field type
            $table->string('type')->default('1')->comment('1:user, 2:admin');
        });
    }
};
