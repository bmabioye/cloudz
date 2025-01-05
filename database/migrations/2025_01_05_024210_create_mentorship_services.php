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
        Schema::create('mentorship_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name'); // e.g., "Advanced Cloud Solutions Mentorship"
            $table->foreignId('consultant_id')->constrained()->onDelete('cascade');
            $table->foreignId('mentorship_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('topic_id')->constrained()->onDelete('cascade');
            $table->decimal('price', 10, 2); // Pricing for the mentorship service
            $table->string('duration'); // e.g., "1 Hour", "3 Days"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentorship_services');
    }
};
