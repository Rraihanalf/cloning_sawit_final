<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pohon extends Model
{
    protected $fillable = [
        'id_pohon',
        'id_sampel',
        'id_lapangan',
        'tgl_tanam',
        'daya_hidup',
        'tinggi_pohon',
        'tgl_kematian',
        'bukti_kematian',
        'deskripsi',
    ];
}
