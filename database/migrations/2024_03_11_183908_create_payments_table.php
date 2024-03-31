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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('ticket')->onUpdate('cascade')->onDelete('cascade');
            $table->string('amount');
            $table->enum('mobile_money_provider', ['mtn', 'at', 'telecel'])->default('mtn');
            $table->string('mobile_money_account');
            $table->enum('status', ['Completed', 'Pending', 'Failed'])->default('Pending');
            $table->timestamp('transaction_date');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
