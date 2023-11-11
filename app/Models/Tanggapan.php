<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';
    public $timestamps = false; // Assuming you don't have created_at and updated_at columns

    protected $fillable = [
        'id_pengaduan',
        'tgl_pembuatan',
        'tanggapan',
        'id_petugas',
    ];
}
