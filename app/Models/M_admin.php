<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_admin extends Model
{
    public function detailDatasiswa($nis)
    {
        return DB::table('tb_siswa')->where('nis', $nis)->first();
    }

    public function editDatasiswa($nis, $data)
    {
        DB::table('tb_siswa')->where('nis', $nis)->update($data);
    }

    public function deleteDatasiswa($nis)
    {
        DB::table('tb_siswa')->where('nis', $nis)->delete();
    }

    public function detailDatapamong($nip)
    {
        return DB::table('tb_pamong')->where('nip', $nip)->first();
    }

    public function editDatapamong($nip, $data)
    {
        DB::table('tb_pamong')->where('nip', $nip)->update($data);
    }

    public function editDatamapel($id_mapel, $data)
    {
        DB::table('tb_mapel')->where('id_mapel', $id_mapel)->update($data);
    }

    public function editDatakelas($id_kelas, $data)
    {
        DB::table('tb_kelas')->where('id_kelas', $id_kelas)->update($data);
    }

    public function deleteDatapamong($nip)
    {
        DB::table('tb_pamong')->where('nip', $nip)->delete();
    }


    public function detailDatakelas($id_kelas)
    {
        return DB::table('tb_kelas')->where('id_kelas', $id_kelas)->first();
    }

    public function deleteDatakelas($id_kelas)
    {
        DB::table('tb_kelas')->where('id_kelas', $id_kelas)->delete();
    }

    public function detailDatamapel($id_mapel)
    {
        return DB::table('tb_mapel')->where('id_mapel', $id_mapel)->first();
    }

    public function deleteDatamapel($id_mapel)
    {
        DB::table('tb_mapel')->where('id_mapel', $id_mapel)->delete();
    }
}
