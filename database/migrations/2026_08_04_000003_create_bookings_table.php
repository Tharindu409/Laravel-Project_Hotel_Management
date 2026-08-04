<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
                $table->foreignId('room_id')->constrained()->cascadeOnDelete();
                $table->date('check_in_date');
                $table->date('check_out_date');
                $table->integer('guests_count')->default(1);
                $table->string('status')->default('pending');
                $table->decimal('total_price', 10, 2)->default(0);
                $table->text('notes')->nullable();
                $table->timestamp('checked_in_at')->nullable();
                $table->timestamp('checked_out_at')->nullable();
                $table->timestamps();
            });

            return;
        }

        Schema::table('bookings', function (Blueprint $table) {
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
        Schema::dropIfExists('bookings');
    }
};
