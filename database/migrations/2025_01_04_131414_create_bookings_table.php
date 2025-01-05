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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('mentorship_service_id')->constrained('mentorship_services')->onDelete('cascade');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->string('status')->default('Pending'); // e.g., Pending, Confirmed, Cancelled
            $table->string('payment_status')->default('Unpaid'); // e.g., Paid, Unpaid
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
