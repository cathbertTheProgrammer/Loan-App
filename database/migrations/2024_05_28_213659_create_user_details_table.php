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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('phoneNumber')->unique();
            $table->string('profilePicture')->nullable();
            $table->integer('nrc')->unique()->nullable();
            $table->string('nrcFrontImage')->nullable();
            $table->string('nrcBackImage')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('district')->nullable();
            $table->string('maritalStatus')->nullable();
            $table->string('numberOfDependants')->nullable();
            $table->string('yearsInEmployment')->nullable();
            $table->string('nameOfEmployer')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
