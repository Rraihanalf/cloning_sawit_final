<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $fillable = [
        'id_lapangan',
        'luas',
        'lokasi',
        'kondisi_tanah',
    ];
}
