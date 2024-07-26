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
        Schema::create('login_activities', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('ip');
            $table->string('user_agent');
            $table->string('login_at');
            $table->string('logout_at')->nullable();
            $table->string('status')->comment('0: failed, 1: success');
            $table->string('device');
            $table->string('browser');
            $table->string('platform')->comment('OS');
            $table->timestamps();

            $table->index('user_id');
            $table->index('ip');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_activities');
    }
};
