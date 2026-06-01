<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('requests', 'barang_id')) {
            return;
        }

        if (DB::getDriverName() === 'oracle') {
            DB::statement('ALTER TABLE REQUESTS MODIFY (BARANG_ID NULL)');

            return;
        }

        Schema::table('requests', function (Blueprint $table) {
            $table->unsignedBigInteger('barang_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasColumn('requests', 'barang_id')) {
            return;
        }

        if (DB::getDriverName() === 'oracle') {
            DB::statement('ALTER TABLE REQUESTS MODIFY (BARANG_ID NOT NULL)');

            return;
        }

        Schema::table('requests', function (Blueprint $table) {
            $table->unsignedBigInteger('barang_id')->nullable(false)->change();
        });
    }
};
