<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Kolom role: 'admin' / 'peserta'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi: Satu User (role peserta) memiliki satu profil Peserta
     */
    public function peserta(): HasOne
    {
        return $this->hasOne(Peserta::class, 'user_id');
    }

    /**
     * Helper untuk mengecek apakah user adalah Admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Helper untuk mengecek apakah user adalah Peserta
     */
    public function isPeserta(): bool
    {
        return $this->role === 'peserta';
    }
}