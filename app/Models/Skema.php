<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skema extends Model
{
    use HasFactory;

    protected $table = 'skemas';

    protected $fillable = [
        'kode_skema',
        'nama_skema',
        'deskripsi',
    ];

    /**
     * Relasi: Satu Skema memiliki banyak Peserta
     */
    public function pesertas(): HasMany
    {
        return $this->hasMany(Peserta::class, 'skema_id');
    }
}