<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_kelolaformulirprogram extends Model
{
    protected $table = 'formulirprogram';
    protected $primaryKey = 'id_daftarprogram';

    protected $fillable = [
        'nama_lengkap', 'jenis_kelamin', 'nisn', 'nik', 'tempat_tanggal_lahir', 'agama',
        'alamat', 'dusun', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi',
        'no_hp', 'email',
        'nama_ayah', 'nik_ayah', 'tahun_lahir_ayah', 'pekerjaan_ayah', 'penghasilan_ayah',
        'nama_ibu', 'nik_ibu', 'tahun_lahir_ibu', 'pekerjaan_ibu', 'penghasilan_ibu',
        'tinggi_badan', 'berat_badan', 'jarak_ke_skb', 'waktu_tempuh',
        'anak_ke', 'jumlah_saudara', 'prestasi', 'paket'
    ];

    public $timestamps = true;
}
