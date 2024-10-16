<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products_new_items', function (Blueprint $table) {
            $table->renameColumn('product_name', 'name');
        });
    }

    public function down()
    {
        Schema::table('products_new_items', function (Blueprint $table) {
            $table->renameColumn('image', 'images');
        });
    }
};
