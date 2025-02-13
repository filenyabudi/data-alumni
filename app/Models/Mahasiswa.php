<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nim',
        'nama',
        'nik',
        'jk',
        'nama_ibu',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'hp',
        'email_kampus',
        'email_pribadi',
        'tahun_masuk',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tanggal_lahir' => 'date',
    ];
}
