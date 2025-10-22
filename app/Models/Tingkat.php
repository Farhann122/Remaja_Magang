<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    use HasFactory;

    protected $table = 'tingkat';
    protected $fillable = [
        'tingkat',
        'status',
        'user_input',
        'tanggal_input',
        'user_update',
        'tanggal_update',
    ];
    public $timestamps = false;
}
