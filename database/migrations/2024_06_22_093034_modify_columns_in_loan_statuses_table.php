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
        Schema::table('loan_statuses', function (Blueprint $table) {
            $table->foreignId('verified_by')->nullable()->change();
            $table->foreignId('recommended_by')->nullable()->change();
            $table->foreignId('approved_by')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loan_statuses', function (Blueprint $table) {
            $table->foreignId('verified_by')->nullable(false)->change();
            $table->foreignId('recommended_by')->nullable(false)->change();
            $table->foreignId('approved_by')->nullable(false)->change();
        });
    }
};
