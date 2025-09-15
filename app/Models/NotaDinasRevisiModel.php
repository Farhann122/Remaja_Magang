<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class NotaDinasRevisiModel extends Model
{
    use HasFactory;

    protected $connection = 'perencanaan';
    protected $table = 'nota_dinas_revisi';

    protected $guarded = [];

    public $timestamps = false;

    // You don't need to explicitly define $fillable when using $guarded = []
    // But if you prefer to be explicit about allowed fields, you could add:
    // protected $fillable = [
    //     'nomor', 'tanggal', 'satker', 'nama_satker', 'perihal', 'isi', 'lampiran',
    //     'user_input', 'tanggal_input', 'user_update', 'tanggal_update', 'status'
    // ];

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
}