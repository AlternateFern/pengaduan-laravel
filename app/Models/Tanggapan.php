<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    public $timestamps = false;
    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';
    protected $fillable = [
        'id_pengaduan',
        'tgl_pembuatan',
        'isi_tanggapan',
        'id_petugas',
        'foto_profil',
    ];
}
