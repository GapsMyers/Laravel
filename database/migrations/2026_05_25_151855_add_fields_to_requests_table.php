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
        if (! Schema::hasColumn('requests', 'pr_number')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->string('pr_number')->nullable()->unique()->after('id');
            });
        }

        if (! Schema::hasColumn('requests', 'department')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->string('department')->nullable()->after('pr_number');
            });
        }

        if (! Schema::hasColumn('requests', 'requester_name')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->string('requester_name')->nullable()->after('department');
            });
        }

        if (! Schema::hasColumn('requests', 'status')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->string('status')->default('pending')->after('requester_name');
            });
        }

        if (! Schema::hasColumn('requests', 'notes')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->text('notes')->nullable()->after('status');
            });
        }

        if (! Schema::hasColumn('requests', 'requested_at')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->date('requested_at')->nullable()->after('notes');
            });
        }

        if (! Schema::hasColumn('requests', 'approved_at')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->timestamp('approved_at')->nullable()->after('requested_at');
            });
        }

        if (! Schema::hasColumn('requests', 'rejected_at')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->timestamp('rejected_at')->nullable()->after('approved_at');
            });
        }

        if (! Schema::hasColumn('requests', 'received_at')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->timestamp('received_at')->nullable()->after('rejected_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('requests', 'received_at')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->dropColumn('received_at');
            });
        }

        if (Schema::hasColumn('requests', 'rejected_at')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->dropColumn('rejected_at');
            });
        }

        if (Schema::hasColumn('requests', 'approved_at')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->dropColumn('approved_at');
            });
        }

        if (Schema::hasColumn('requests', 'requested_at')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->dropColumn('requested_at');
            });
        }

        if (Schema::hasColumn('requests', 'notes')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->dropColumn('notes');
            });
        }

        if (Schema::hasColumn('requests', 'status')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }

        if (Schema::hasColumn('requests', 'requester_name')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->dropColumn('requester_name');
            });
        }

        if (Schema::hasColumn('requests', 'department')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->dropColumn('department');
            });
        }

        if (Schema::hasColumn('requests', 'pr_number')) {
            Schema::table('requests', function (Blueprint $table) {
                $table->dropColumn('pr_number');
            });
        }
    }
};
