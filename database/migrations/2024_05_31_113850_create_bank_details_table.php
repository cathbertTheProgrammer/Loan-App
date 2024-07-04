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
        Schema::create('bank_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('bank_name');
            $table->string('branch');
            $table->String('account_name')->unique();
            $table->string('account_duration');
            $table->boolean('active_loan')->default(false);
            $table->string('organisation_name')->nullable();
            $table->string('organisation_address')->nullable();
            $table->string('total_debt')->nullable();
            $table->string('remaining_years')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_details');
    }
};
