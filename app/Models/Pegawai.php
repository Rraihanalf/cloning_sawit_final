<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    
    protected $fillable = [
        'id_pegawai',
        'id_lab',
        'nama_pegawai',
        'jenis_kelamin',
        'email_pegawai',
        'no_hp_pegawai',
    ];
}
