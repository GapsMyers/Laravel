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
        if (! Schema::hasColumn('barangs', 'nama_barang')) {
            Schema::table('barangs', function (Blueprint $table) {
                $table->string('nama_barang')->nullable()->after('id');
            });
        }

        if (! Schema::hasColumn('barangs', 'kode_barang')) {
            Schema::table('barangs', function (Blueprint $table) {
                $table->string('kode_barang')->nullable()->unique()->after('nama_barang');
            });
        }

        if (! Schema::hasColumn('barangs', 'stok')) {
            Schema::table('barangs', function (Blueprint $table) {
                $table->unsignedInteger('stok')->default(0)->after('kode_barang');
            });
        }

        if (! Schema::hasColumn('barangs', 'status')) {
            Schema::table('barangs', function (Blueprint $table) {
                $table->boolean('status')->default(true)->after('stok');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('barangs', 'status')) {
            Schema::table('barangs', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }

        if (Schema::hasColumn('barangs', 'stok')) {
            Schema::table('barangs', function (Blueprint $table) {
                $table->dropColumn('stok');
            });
        }

        if (Schema::hasColumn('barangs', 'kode_barang')) {
            Schema::table('barangs', function (Blueprint $table) {
                $table->dropColumn('kode_barang');
            });
        }

        if (Schema::hasColumn('barangs', 'nama_barang')) {
            Schema::table('barangs', function (Blueprint $table) {
                $table->dropColumn('nama_barang');
            });
        }
    }
};
