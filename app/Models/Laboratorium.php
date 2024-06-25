<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    protected $fillable = [
        'id_lab',
        'nama_lab',
        'kapasitas',
        'jumlah_pegawai',
    ];
}
