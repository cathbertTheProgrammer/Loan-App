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
        Schema::create('guarantors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('guarantorFullname')->nullable();
            $table->string('guarantorPhoneNumber')->nullable();
            $table->String('guarantorNrc')->unique();
            $table->string('refereeFullname')->nullable();
            $table->string('refereePhoneNumber')->nullable();
            $table->string('refereePosition')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guarantors');
    }
};
