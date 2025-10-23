<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Poster extends Model
{
    use HasFactory;

    protected $connection = 'parja';
    protected $table = 'poster';

    protected $fillable = [
        'judul',
        'deskripsi',
        'file_name',
        'file_type',
        'file_size',
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
            $model->status = 1;
            $model->status_publikasi = $model->status_publikasi ?? 0;
        });

        static::updating(function ($model) {
            $model->user_update = Auth::check() ? Auth::user()->username : 'system';
            $model->tanggal_update = now();
        });
    }
}
