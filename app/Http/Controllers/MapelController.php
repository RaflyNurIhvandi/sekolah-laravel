<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MapelController extends Controller
{
    public function deletemapel($no_mapel)
    {
        DB::table('mata_pelajaran')->where('no_mapel', $no_mapel)->delete();
        return back();
    }
    public function updatemapel(Request $request, $no_mapel)
    {
        $guru = $request->namaguru;
        if($guru == null){
            DB::table('mata_pelajaran')->where('no_mapel', $no_mapel)->update([
                'nama_mapel'=>$request->namamapel,
                'subjek_mapel'=>$request->subjekmapel,
                'deskripsi_mapel'=>$request->desmapel
            ]);
        } else {
            DB::table('mata_pelajaran')->where('no_mapel', $no_mapel)->update([
                'nama_mapel'=>$request->namamapel,
                'no_guru_mapel'=>$request->namaguru,
                'subjek_mapel'=>$request->subjekmapel,
                'deskripsi_mapel'=>$request->desmapel
            ]);
        }
        return back();
    }
    public function tambahmapel(Request $request)
    {
        $isi = "";
        $no = "NMS".date("YmdHis");
        DB::table('mata_pelajaran')->insert([
            'no_akreditasi'=>$isi,
            'npsn'=>$request->npsn,
            'no_mapel'=>$no,
            'no_guru_mapel'=>$request->namaguru,
            'nama_mapel'=>$request->namamapel,
            'subjek_mapel'=>$request->subjekmapel,
            'deskripsi_mapel'=>$request->deskripsimapel
        ]);
        return back();
    }
}
