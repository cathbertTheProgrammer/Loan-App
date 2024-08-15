<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_type_id')->constrained()->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('email');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->text('address')->nullable();
            $table->boolean('urgent');
            $table->date('deadline');
            $table->string('status')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_requests');
    }


};
