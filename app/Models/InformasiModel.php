<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class InformasiModel extends Model
{
    use HasFactory;

    protected $table = 'informasi';
    protected $fillable = [
        'judul',
        'keterangan',
        'status',
        'user_input',
        'tanggal_input',
        'user_update',
        'tanggal_update'
    ];

    protected $casts = [
        'tanggal_input' => 'datetime',
        'tanggal_update' => 'datetime',
    ];

    public $timestamps = false;
}