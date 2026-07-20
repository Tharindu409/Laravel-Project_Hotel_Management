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
        Schema::table('users', function (Blueprint $table): void {
            if (! Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('email');
            }

            if (! Schema::hasColumn('users', 'usertype')) {
                $table->string('usertype')->default('user')->after('phone');
            }

            if (! Schema::hasColumn('users', 'current_team_id')) {
                $table->foreignId('current_team_id')->nullable()->after('remember_token');
            }

            if (! Schema::hasColumn('users', 'profile_photo_path')) {
                $table->string('profile_photo_path', 2048)->nullable()->after('current_team_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            if (Schema::hasColumn('users', 'profile_photo_path')) {
                $table->dropColumn('profile_photo_path');
            }

            if (Schema::hasColumn('users', 'current_team_id')) {
                $table->dropColumn('current_team_id');
            }

            if (Schema::hasColumn('users', 'usertype')) {
                $table->dropColumn('usertype');
            }

            if (Schema::hasColumn('users', 'phone')) {
                $table->dropColumn('phone');
            }
        });
    }
};