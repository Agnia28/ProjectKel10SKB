<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Pesertadidik extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('peserta_didik')->get();
    }

    public function detailData($nisn)
    {
        return DB::table('peserta_didik')->where('nisn', $nisn)->first();
    }

    public function addData($data)
    {
        DB::table('peserta_didik')->insert($data);
    }

    public function editData($nisn, $data)
    {
        DB::table('peserta_didik')->where('nisn', $nisn)->update($data);
    }

    public function deleteData($nisn)
    {
        DB::table('peserta_didik')->where('nisn', $nisn)->delete();
    }
}
