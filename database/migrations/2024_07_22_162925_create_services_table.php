<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
        // Schema::create('services', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('service_type');
        //     $table->string('accounting_&_tax')->nullable();
        //     $table->string('immigration')->nullable();
        //     $table->string('customs_&_clearing')->nullable();
        //     $table->longText('description');
        //     $table->string('firsname');
        //     $table->string('lastname');
        //     $table->string('email');
        //     $table->string('phone');
        //     $table->string('address');
        //     $table->string('urgent');
        //     $table->date('deadline');
        //     $table->timestamps();
        // });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('services');
    }
};
