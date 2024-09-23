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
        Schema::table('send_messages', function (Blueprint $table) {
            $table->string('is_star')->default('0')->comment('1 is star, 0 is not star');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('send_messages', function (Blueprint $table) {
            //
        });
    }
};
