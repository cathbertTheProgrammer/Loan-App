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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('loan_type');
            $table->string('pay_slips')->nullable();
            $table->string('sales_records')->nullable();
            $table->double('amount');
            $table->string('amount_in_words');
            $table->string('period');
            $table->longText('purpose');
            $table->string('status')->default('PENDING');
            $table->string('comment')->nullable();
            $table->foreignId('approved_by')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
