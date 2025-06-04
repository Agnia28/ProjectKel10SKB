<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Tpesertadidik extends Model
{
    // Nama tabel di database
    protected $table = 'peserta_didik';

    // Primary key (jika tidak menggunakan id default)
    protected $primaryKey = 'nisn';

    // Tidak menggunakan timestamps bawaan (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'agama',
        'program',
        'nomor_handphone',
        'fotopesertadidik'
    ];
}
