<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('requests', 'type')) {
            return;
        }

        if (DB::getDriverName() === 'oracle') {
            DB::statement('ALTER TABLE REQUESTS MODIFY ("TYPE" NULL)');

            return;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasColumn('requests', 'type')) {
            return;
        }

        if (DB::getDriverName() === 'oracle') {
            DB::statement('ALTER TABLE REQUESTS MODIFY ("TYPE" NOT NULL)');

            return;
        }
    }
};
