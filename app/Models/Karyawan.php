<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Karyawan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'Nama',
        'Email',
        'Role',
        'status',
        'password',
    ];

    /**
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Map capitalized attribute names to their lowercase equivalents
     * to handle Oracle DB returning lowercase column names.
     *
     * @var array<string, string>
     */
    private const COLUMN_MAP = [
        'Nama' => 'nama',
        'Email' => 'email',
        'Role' => 'role',
    ];

    /**
     * @param  string  $key
     */
    public function getAttribute($key): mixed
    {
        if (isset(self::COLUMN_MAP[$key])) {
            $value = parent::getAttribute($key);

            return $value ?? parent::getAttribute(self::COLUMN_MAP[$key]);
        }

        return parent::getAttribute($key);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
