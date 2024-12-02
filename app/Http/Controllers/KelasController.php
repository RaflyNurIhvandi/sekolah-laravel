<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function updatekelas(Request $request, $no_kelas)
    {
        DB::table('kelas')->where('no_kelas', $no_kelas)->update([
            'urutan'=>$request->urutankelas,
            'tingkat'=>$request->tingkatkelas,
            'abjad'=>$request->abjadkelas
        ]);
        return back();
    }
    public function delkelas($no_kelas)
    {
        DB::table('kelas')->where('no_kelas', $no_kelas)->delete();
        return back();
    }
    public function addkelas(Request $request)
    {
        $no = "KLS".date("YmdHis");
        $nojurusan = "";
        DB::table('kelas')->insert([
            'urutan'=>$request->urutankelas,
            'no_jurusan'=>$nojurusan,
            'no_kelas'=>$no,
            'npsn'=>$request->npsn,
            'tingkat'=>$request->tingkatkelas,
            'abjad'=>$request->abjadkelas
        ]);
        return back();
    }
}
