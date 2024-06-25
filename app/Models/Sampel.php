<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampel extends Model
{
    protected $fillable = [
        'id_sampel',
        'id_lab',
        'jenis_bibit',
        'asal_bibit',
    ];
}
