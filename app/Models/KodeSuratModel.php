<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeSuratModel extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql';
    protected $table = 'kode_surat';
    protected $fillable = ['kode_surat', 'keterangan', 'status', 'user_input', 'tanggal_input', 'user_update', 'tanggal_update'];
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            $model->tanggal_input = now();
        });
        
        static::updating(function ($model) {
            $model->tanggal_update = now();
        });
    }
}