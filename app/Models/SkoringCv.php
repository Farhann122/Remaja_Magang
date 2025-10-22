<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SkoringCv extends Model
{
    use HasFactory;

    protected $table = 'skoring_cv';

    protected $fillable = [
        'id_kegiatan',
        'id_tingkat',
        'id_partisipasi',
        'deskripsi',
        'skor',
        'status',
        'user_input',
        'tanggal_input',
        'user_update',
        'tanggal_update',
    ];

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_input = Auth::check() ? Auth::user()->username : 'system';
            $model->tanggal_input = now();
        });

        static::updating(function ($model) {
            $model->user_update = Auth::check() ? Auth::user()->username : 'system';
            $model->tanggal_update = now();
        });
    }

    // === Relasi ===
    public function kegiatan()
    {
        return $this->belongsTo(\App\Models\Kegiatan::class, 'id_kegiatan');
    }

    public function tingkat()
    {
        return $this->belongsTo(\App\Models\Tingkat::class, 'id_tingkat');
    }

    public function partisipasi()
    {
        return $this->belongsTo(\App\Models\PartisipasiModel::class, 'id_partisipasi');
    }
}
