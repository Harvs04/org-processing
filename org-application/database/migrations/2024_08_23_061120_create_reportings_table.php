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
        Schema::create('reportings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_id');
            $table->unsignedBigInteger('developer_id');
            $table->foreign('applicant_id')->references('id')->on('users');
            $table->foreign('developer_id')->references('id')->on('users');
            $table->enum('status', ['Pending', 'In progress', 'Accomplished', 'Failed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportings');
    }
};
