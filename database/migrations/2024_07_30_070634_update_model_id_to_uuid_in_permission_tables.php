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
        // Update model_has_roles table
        Schema::table('model_has_roles', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['role_id']);
            $table->dropPrimary(['model_id', 'model_type', 'role_id']);

            // Change model_id column to uuid
            $table->uuid('model_id')->change();

            // Re-add foreign key constraints and primary key
            $table->primary(['model_id', 'model_type', 'role_id']);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });

        // Update model_has_permissions table
        Schema::table('model_has_permissions', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['permission_id']);
            $table->dropPrimary(['model_id', 'model_type', 'permission_id']);

            // Change model_id column to uuid
            $table->uuid('model_id')->change();

            // Re-add foreign key constraints and primary key
            $table->primary(['model_id', 'model_type', 'permission_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
// Revert changes in model_has_roles table
        Schema::table('model_has_roles', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['role_id']);
            $table->dropPrimary(['model_id', 'model_type', 'role_id']);

            // Change model_id column back to bigInteger
            $table->bigInteger('model_id')->change();

            // Re-add foreign key constraints and primary key
            $table->primary(['model_id', 'model_type', 'role_id']);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });

        // Revert changes in model_has_permissions table
        Schema::table('model_has_permissions', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['permission_id']);
            $table->dropPrimary(['model_id', 'model_type', 'permission_id']);

            // Change model_id column back to bigInteger
            $table->bigInteger('model_id')->change();

            // Re-add foreign key constraints and primary key
            $table->primary(['model_id', 'model_type', 'permission_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
};
