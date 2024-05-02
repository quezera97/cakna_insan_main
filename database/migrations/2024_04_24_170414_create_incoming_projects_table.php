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
        Schema::create('incoming_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->unique();
            $table->string('subtitle')->nullable();
            $table->longText('details')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->time('time_from')->nullable();
            $table->time('time_to')->nullable();
            $table->string('place')->nullable();
            $table->integer('pax')->nullable();
            $table->boolean('transportation')->nullable()->default(0);
            $table->string('poster_image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_projects');
    }
};
