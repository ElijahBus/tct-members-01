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
        Schema::create('member_school', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id');
            $table->foreignId('school_id');
            $table->timestamps();

            $table->foreign('member_id')->on('members')->references('id')->cascadeOnDelete();
            $table->foreign('school_id')->on('schools')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_school');
    }
};
