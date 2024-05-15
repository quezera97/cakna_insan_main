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
        Schema::create('video_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->string('video_type')->nullable();
            $table->string('iframe_components');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->longText('details')->nullable();
            $table->integer('arrangement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_details');
    }
};
