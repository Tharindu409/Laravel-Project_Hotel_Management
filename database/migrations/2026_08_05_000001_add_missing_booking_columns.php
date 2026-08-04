<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'customer_id')) {
                $table->foreignId('customer_id')->nullable()->constrained()->cascadeOnDelete();
            }
            if (!Schema::hasColumn('bookings', 'room_id')) {
                $table->foreignId('room_id')->nullable()->constrained()->cascadeOnDelete();
            }
            if (!Schema::hasColumn('bookings', 'check_in_date')) {
                $table->date('check_in_date')->nullable();
            }
            if (!Schema::hasColumn('bookings', 'check_out_date')) {
                $table->date('check_out_date')->nullable();
            }
            if (!Schema::hasColumn('bookings', 'guests_count')) {
                $table->integer('guests_count')->default(1);
            }
            if (!Schema::hasColumn('bookings', 'status')) {
                $table->string('status')->default('pending');
            }
            if (!Schema::hasColumn('bookings', 'total_price')) {
                $table->decimal('total_price', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('bookings', 'notes')) {
                $table->text('notes')->nullable();
            }
            if (!Schema::hasColumn('bookings', 'checked_in_at')) {
                $table->timestamp('checked_in_at')->nullable();
            }
            if (!Schema::hasColumn('bookings', 'checked_out_at')) {
                $table->timestamp('checked_out_at')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'customer_id')) {
                $table->dropForeign(['customer_id']);
                $table->dropColumn('customer_id');
            }
            if (Schema::hasColumn('bookings', 'room_id')) {
                $table->dropForeign(['room_id']);
                $table->dropColumn('room_id');
            }
            if (Schema::hasColumn('bookings', 'check_in_date')) {
                $table->dropColumn('check_in_date');
            }
            if (Schema::hasColumn('bookings', 'check_out_date')) {
                $table->dropColumn('check_out_date');
            }
            if (Schema::hasColumn('bookings', 'guests_count')) {
                $table->dropColumn('guests_count');
            }
            if (Schema::hasColumn('bookings', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('bookings', 'total_price')) {
                $table->dropColumn('total_price');
            }
            if (Schema::hasColumn('bookings', 'notes')) {
                $table->dropColumn('notes');
            }
            if (Schema::hasColumn('bookings', 'checked_in_at')) {
                $table->dropColumn('checked_in_at');
            }
            if (Schema::hasColumn('bookings', 'checked_out_at')) {
                $table->dropColumn('checked_out_at');
            }
        });
    }
};
