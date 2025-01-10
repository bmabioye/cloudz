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
        Schema::table('plans', function (Blueprint $table) {
            $table->text('features')->nullable()->after('duration_months'); // Add features column
            $table->unsignedBigInteger('coupon_id')->nullable()->after('features'); // Add coupon_id column

            $table->foreign('coupon_id')
                ->references('id')
                ->on('coupons')
                ->onDelete('set null'); // Ensure coupon deletion doesn't break plans
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropForeign(['coupon_id']); // Drop the foreign key constraint
            $table->dropColumn(['features', 'coupon_id']); // Drop the columns
        });
    }
};
