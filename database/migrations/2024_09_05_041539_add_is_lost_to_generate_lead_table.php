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
            $table->string('is_lost')->default(1)->comment('1 = not lost, 2 = lost')->after('priority');
            $table->string('lost_reason')->after('is_lost')->nullable();
            $table->string('closing_note')->after('lost_reason')->nullable();
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
