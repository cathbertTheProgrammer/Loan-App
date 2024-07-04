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
        Schema::create('monthly_incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->double('salary')->nullable();
            $table->double('business_income')->nullable();
            $table->double('other_income')->nullable();
            $table->double('total_income')->nullable();
            $table->double('rent')->nullable();
            $table->double('salaries_wages')->nullable();
            $table->double('other_expenses')->nullable();
            $table->double('total_expenses')->nullable();
            $table->double('net_income')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_incomes');
    }
};
