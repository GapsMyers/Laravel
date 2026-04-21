<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'stok',
        'status',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'stok' => 'integer',
            'status' => 'boolean',
        ];
    }
}
