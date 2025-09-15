<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SuratKeluarModel extends Model
{
    use HasFactory;

    protected $connection = 'perencanaan';
    protected $table = 'surat_keluar';

    protected $guarded = [];
    public $timestamps = false;


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_input = Auth::check() ? Auth::user()->username : 'system';
            $model->tanggal_input = now();
            
            // Set default status if not provided
            if (!isset($model->status)) {
                $model->status = 1; // Active
            }
        });

        static::updating(function ($model) {
            $model->user_update = Auth::check() ? Auth::user()->username : 'system';
            $model->tanggal_update = now();
        });
    }
    /**
     * Relasi ke model TujuanSuratModel.
     */
    public function klasifikasi()
    {
        return $this->belongsTo(\App\Models\KlasifikasiSuratModel::class, 'id_klasifikasi_surat');
    }
    public function kodeSurat()
    {
        return $this->belongsTo(\App\Models\KodeSuratModel::class, 'id_kode_surat');
    }

}
