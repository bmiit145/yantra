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
        Schema::create('emp_work_infos', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->nullable();
            $table->string('work_adddress')->nullable();
            $table->string('work_loaction')->nullable();
            $table->string('time_shit')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('timezone')->nullable();
            $table->string('roles')->nullable();
            $table->string('default_role')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_work_infos');
    }
};
