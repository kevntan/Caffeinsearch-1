<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'lokasi',
        'alamat',
        'wfc_friendly',
        'wifi',
        'charging_port',
        'lahan_parkir',
        'smoking_area',
        'mushola',
        'toilet',
        'range_harga',
        'telepon',
        'operasional_buka',
        'operasional_tutup',
        'deskripsi',
        'maps',
        'foto',
        'foto2',
        'foto3',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
