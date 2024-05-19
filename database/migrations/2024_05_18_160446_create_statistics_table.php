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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('details');
            $table->string('statistic_1');
            $table->string('statistic_2');
            $table->string('statistic_3');
            $table->string('statistic_4');
            $table->string('statistic_1_value');
            $table->string('statistic_2_value');
            $table->string('statistic_3_value');
            $table->string('statistic_4_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
