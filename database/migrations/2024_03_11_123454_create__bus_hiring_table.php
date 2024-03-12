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
        Schema::create('bus_hirings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contacts_name');
            $table->string('email');
            $table->integer('phone');
            $table->integer('additional_phone')->nullable();
            $table->string('start_location');
            $table->string('end_location');
            $table->dateTime('depart_date');
            $table->integer('number_of_busses');
            $table->integer('bus_capacity');
            $table->integer('number_of_days');
            $table->text('purpose');
            $table->enum('status',['approve', 'decline'])->default('approve');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_hirings');
    }
};
