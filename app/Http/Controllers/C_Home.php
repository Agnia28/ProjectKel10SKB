<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Home extends Controller
{
    public function index(){
        $data = [
            'nama_pt' => 'SPNF SKB SNN KABUPATEN SUBANG',
            'alamat' => 'Jln Brigjen Katamso Dangdeur Subang'
        ];
        return view('v_home',$data);
    }

        public function about($id){
            return 'ini halaman about dengan id : '.$id;
        }
}
