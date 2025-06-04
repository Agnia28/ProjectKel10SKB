<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Pamongbelajar extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('tb_pamongbelajar')->get();
    }

    public function detailData($id_pamongbelajar)
    {
        return DB::table('tb_pamongbelajar')->where('id_pamongbelajar', $id_pamongbelajar)->first();
    }

    public function addData($data)
    {
        DB::table('tb_pamongbelajar')->insert($data);
    }

    public function editData($id_pamongbelajar, $data)
    {
        DB::table('tb_pamongbelajar')->where('id_pamongbelajar', $id_pamongbelajar)->update($data);
    }

    public function deleteData($id_pamongbelajar)
    {
        DB::table('tb_pamongbelajar')->where('id_pamongbelajar', $id_pamongbelajar)->delete();
    }
}
