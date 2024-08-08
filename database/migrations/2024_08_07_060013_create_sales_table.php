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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->constrained('contacts')->onDelete('cascade')->nullable();
            $table->foreignId('stage_id')->constrained('crm_stages')->onDelete('cascade');
            $table->uuid('user_id');
            $table->string('opportunity');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('expected_revenue', 15, 2)->nullable();
            // priority: low, medium, high
            $table->enum('priority', ['low', 'medium', 'high'])->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
