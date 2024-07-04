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
        Schema::create('loan_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('verification_status')->nullable();
            $table->string('verification_comment')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('recommendation_status')->nullable();
            $table->string('recommendation_comment')->nullable();
            $table->foreignId('recommended_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('approval_status')->nullable();
            $table->string('approval_comment')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_statuses');
    }
};
