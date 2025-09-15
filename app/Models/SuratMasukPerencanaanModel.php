<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SuratMasukPerencanaanModel extends Model
{
    protected $connection = 'perencanaan';
    protected $table = 'surat_masuk_perencanaan';
    
    protected $fillable = [
        'no_arsip',
        'nomor',
        'tanggal',
        'asal_surat',
        'kode_keuangan',
        'judul',
        'keterangan',
        'klasifikasi',
        'file_path',
        'file_name',
        'file_size',
        'tipe_asal_surat',
        'keterangan_file_path',
        'keterangan_file_name',
        'keterangan_file_size',
        'arsip_file_path',
        'arsip_file_name',
        'arsip_file_size',
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
            $model->user_input = Auth::user()->name ?? 'System';
            $model->tanggal_input = now();
            $model->status = 1;
        });

        static::updating(function ($model) {
            $model->user_update = Auth::user()->name ?? 'System';
            $model->tanggal_update = now();
        });
    }
}
