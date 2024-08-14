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
        Schema::create('emp_skills', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('skill_id');
            $table->unsignedBigInteger('skill_type_id');
            $table->unsignedBigInteger('skill_level_id');
            $table->unsignedBigInteger('emp_id');
            $table->timestamps();

            // Foreign keys (assuming you have corresponding tables)
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            $table->foreign('skill_type_id')->references('id')->on('skill_types')->onDelete('cascade');
            $table->foreign('skill_level_id')->references('id')->on('skill_levels')->onDelete('cascade');
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_skills');
    }
};
