<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Publikasi extends Model
{
    use HasFactory;

    protected $connection = 'parja';
    protected $table = 'publikasi';

    protected $fillable = [
        'judul',
        'deskripsi',
        'file_publikasi_uri',
        'cover_uri',
        'status_publikasi',
        'status',
        'user_input',
        'tanggal_input',
        'user_update',
        'tanggal_update'
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
}
