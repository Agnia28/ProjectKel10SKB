<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_pamong extends Model
{
    public function deleteDatamateri($id_materi)
    {
        DB::table('tb_materi')->where('id_materi', $id_materi)->delete();
    }

    public function detailDatamateri($id_materi)
    {
        return DB::table('tb_materi')->where('id_materi', $id_materi)->first();
    }

    public function editDatamateri($id_materi, $data)
    {
        DB::table('tb_materi')->where('id_materi', $id_materi)->update($data);
    }

}
