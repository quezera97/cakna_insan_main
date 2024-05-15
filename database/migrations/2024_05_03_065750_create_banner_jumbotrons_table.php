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
        Schema::create('banner_jumbotrons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->longText('details')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->boolean('is_featured')->nullable();
            $table->string('banner_file_name')->nullable()->unique();
            $table->string('banner_image_path')->nullable();

            $table->string('donation_button_url')->nullable();
            $table->foreignId('details_button_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_jumbotrons');
    }
};
