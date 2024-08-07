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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('job_title')->nullable();
            $table->string('work_mobile')->nullable();
            $table->string('department')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('job_position')->nullable();
            $table->string('work_email')->nullable();
            $table->string('manager')->nullable();
            $table->string('tags')->nullable();
            $table->string('coach')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
