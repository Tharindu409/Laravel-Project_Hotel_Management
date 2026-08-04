<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('rooms')) {
            Schema::create('rooms', function (Blueprint $table) {
                $table->id();
                $table->string('hotel_name')->nullable();
                $table->string('title');
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->decimal('price_per_night', 10, 2)->default(0);
                $table->integer('capacity_adults')->default(1);
                $table->integer('capacity_children')->default(0);
                $table->string('room_type')->nullable();
                $table->string('image')->nullable();
                $table->boolean('is_featured')->default(false);
                $table->boolean('is_available')->default(true);
                $table->json('amenities')->nullable();
                $table->timestamps();
            });

            return;
        }

        Schema::table('rooms', function (Blueprint $table) {
            if (!Schema::hasColumn('rooms', 'hotel_name')) {
                $table->string('hotel_name')->nullable();
            }
            if (!Schema::hasColumn('rooms', 'price_per_night')) {
                $table->decimal('price_per_night', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('rooms', 'capacity_adults')) {
                $table->integer('capacity_adults')->default(1);
            }
            if (!Schema::hasColumn('rooms', 'capacity_children')) {
                $table->integer('capacity_children')->default(0);
            }
            if (!Schema::hasColumn('rooms', 'room_type')) {
                $table->string('room_type')->nullable();
            }
            if (!Schema::hasColumn('rooms', 'image')) {
                $table->string('image')->nullable();
            }
            if (!Schema::hasColumn('rooms', 'is_featured')) {
                $table->boolean('is_featured')->default(false);
            }
            if (!Schema::hasColumn('rooms', 'is_available')) {
                $table->boolean('is_available')->default(true);
            }
            if (!Schema::hasColumn('rooms', 'amenities')) {
                $table->json('amenities')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
