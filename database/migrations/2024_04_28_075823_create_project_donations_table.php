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
        Schema::create('project_donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->decimal('donation_amount', 10, 2)->default(0.00);
            $table->string('billTo');
            $table->string('billEmail');
            $table->string('billPhone');
            $table->string('billpaymentInvoiceNo');
            $table->string('billPaymentDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_donations');
    }
};
