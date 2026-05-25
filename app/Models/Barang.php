<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'stok',
        'status',
    ];

    protected $attributes = [
        'stok' => 0,
        'status' => true,
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

    public function requestItems(): HasMany
    {
        return $this->hasMany(RequestItem::class);
    }
}
