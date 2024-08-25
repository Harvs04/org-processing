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
        Schema::create('million_dollar_ideas', function (Blueprint $table) {
            $table->id();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('location');
            $table->enum('status', ['starting', 'ongoing', 'accomplished', 'failed']);
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('applicant_groups')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('million_dollar_ideas');
    }
};
