<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('booking_id')->constrained()->cascadeOnDelete();
                $table->decimal('amount', 10, 2);
                $table->string('payment_method');
                $table->string('status')->default('Pending');
                $table->timestamp('payment_date')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
            });

            return;
        }

        Schema::table('payments', function (Blueprint $table) {
            if (!Schema::hasColumn('payments', 'amount')) {
                $table->decimal('amount', 10, 2);
            }
            if (!Schema::hasColumn('payments', 'payment_method')) {
                $table->string('payment_method');
            }
            if (!Schema::hasColumn('payments', 'status')) {
                $table->string('status')->default('Pending');
            }
            if (!Schema::hasColumn('payments', 'payment_date')) {
                $table->timestamp('payment_date')->nullable();
            }
            if (!Schema::hasColumn('payments', 'notes')) {
                $table->text('notes')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
