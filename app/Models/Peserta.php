<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peserta extends Model
{
    protected $fillable = [
        'no_peserta',
        'nama',
        'nik',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'skema_id',
    ];

    public function skema(): BelongsTo
    {
        return $this->belongsTo(Skema::class);
    }
}