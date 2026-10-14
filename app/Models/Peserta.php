<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'pesertas';

    protected $fillable = [
        'user_id',
        'skema_id',
        'no_peserta',
        'nama',
        'nik',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
    ];

    /**
     * Relasi: Peserta dimiliki oleh satu User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi: Peserta mengambil satu Skema
     */
    public function skema(): BelongsTo
    {
        return $this->belongsTo(Skema::class, 'skema_id');
    }
}