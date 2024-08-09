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
        Schema::create('emp_private_infos', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('language')->nullable();
            $table->string('home_to_work_distance')->nullable();
            $table->string('private_car_plate')->nullable();

            $table->string('marital_status')->nullable();
            $table->string('number_of_dependent_children')->nullable();

            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_phone')->nullable();
            
            $table->string('certificate_level')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('school')->nullable();

            $table->string('nationality')->nullable();
            $table->string('identification_no')->nullable();
            $table->string('ssn_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('country_of_birth')->nullable();

            $table->string('visa_no')->nullable();
            $table->string('work_permit_no')->nullable();
            $table->string('visa_expiration_date')->nullable();
            $table->string('work_permit_expiration_date')->nullable();
            $table->string('work_permit')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_private_infos');
    }
};
