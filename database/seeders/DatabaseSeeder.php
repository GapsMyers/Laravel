<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Karyawan::query()->create([
            'Nama' => 'Admin Demo',
            'Email' => 'admin@inventrack.com',
            'Role' => 'Admin',
            'status' => true,
            'password' => 'admin123',
        ]);
    }
}
