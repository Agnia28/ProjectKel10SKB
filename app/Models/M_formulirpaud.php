<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_formulirpaud extends Model
{
    protected $table = 'formulir_paud';
    protected $primaryKey = 'id_paud';
    public $timestamps = true;

    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'nik',
        'jenis_kelamin',
        'tempat_tanggal_lahir',
        'agama',
        'kewarganegaraan',
        'anak_ke',
        'jumlah_saudara',
        'berat_badan',
        'tinggi_badan',
        'golongan_darah',
        'penyakit_pernah_diderita',
        'alamat',
        'no_hp',
        'jarak_tempat_tinggal',

        'nama_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',

        'nama_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',

        'nama_wali',
        'pendidikan_wali',
        'hubungan_keluarga',
        'pekerjaan_wali',

        'status_masuk',
        'asal_paud',
        'tanggal_pindah',
        'tanggal_diterima',
        'di_kelompok'
    ];
}
