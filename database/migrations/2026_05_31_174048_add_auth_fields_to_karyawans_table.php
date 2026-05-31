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
        Schema::table('karyawans', function (Blueprint $table) {
            if (! Schema::hasColumn('karyawans', 'Email')) {
                $table->string('Email')->nullable()->unique();
            }

            if (! Schema::hasColumn('karyawans', 'email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable();
            }

            if (! Schema::hasColumn('karyawans', 'password')) {
                $table->string('password')->nullable();
            }

            if (! Schema::hasColumn('karyawans', 'remember_token')) {
                $table->string('remember_token', 100)->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyawans', function (Blueprint $table) {
            if (Schema::hasColumn('karyawans', 'remember_token')) {
                $table->dropColumn('remember_token');
            }

            if (Schema::hasColumn('karyawans', 'password')) {
                $table->dropColumn('password');
            }

            if (Schema::hasColumn('karyawans', 'email_verified_at')) {
                $table->dropColumn('email_verified_at');
            }

            if (Schema::hasColumn('karyawans', 'Email')) {
                $table->dropColumn('Email');
            }
        });
    }
};
