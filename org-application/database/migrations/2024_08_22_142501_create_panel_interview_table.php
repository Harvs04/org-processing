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
        if (!Schema::hasTable('panel_interviews')) {
            Schema::create('panel_interviews', function (Blueprint $table) {
                $table->id();
                $table->date('date');
                $table->time('start_time');
                $table->time('end_time');
                $table->string('location');
                $table->enum('status', ['starting', 'ongoing', 'accomplished', 'failed']);
                $table->unsignedBigInteger('group_id');
                $table->foreign('group_id')->references('id')->on('applicant_groups')->onDelete('cascade');;
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panel_interviews');
    }
};
