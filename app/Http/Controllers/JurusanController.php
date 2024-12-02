<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JurusanController extends Controller
{
    public function hapusjurusan($no_jurusan)
    {
        $isinojur = "";
        DB::table('kelas')->where('no_jurusan', $no_jurusan)->update([
            'no_jurusan'=>$isinojur
        ]);
        DB::table('jurusan')->where('no_jurusan', $no_jurusan)->delete();
        return back();
    }
    public function tambahkelas(Request $request)
    {
        $getkelas = DB::table('kelas')->get();
        foreach ($getkelas as $k) {
            $nameform = "tambah_kelas_".$k->no_kelas;
            $namewhere = "where_kelas_".$k->no_kelas;
            $isijurusan = $request->$nameform;
            $wherekelas = $request->$namewhere;
            DB::table('kelas')->where('no_kelas', $wherekelas)->update([
                'no_jurusan'=>$isijurusan
            ]);
        }
        return back();
    }
    public function updatejurusan(Request $request, $no_jurusan)
    {
        DB::table('jurusan')->where('no_jurusan', $no_jurusan)->update([
            'nama_jurusan'=>$request->namajurusan,
            'subjek_jurusan'=>$request->subjekjurusan,
            'deskripsi_jurusan'=>$request->deskripsijurusan
        ]);
        $data = DB::table('kelas')->get();
        foreach ($data as $k) {
            $name = "hapus_kelas_".$k->no_kelas;
            $whr = $request->$name;
            $isi = "";
            DB::table('kelas')->where('no_kelas', $whr)->update([
                'no_jurusan'=>$isi
            ]);
        }
        return back();
    }
    public function tambahjurusan(Request $request)
    {
        $no = "JRS".date("YmdHis");
        DB::table('jurusan')->insert([
            'no_jurusan'=>$no,
            'npsn'=>$request->npsn,
            'nama_jurusan'=>$request->namajurusan,
            'subjek_jurusan'=>$request->subjekjurusan,
            'deskripsi_jurusan'=>$request->deskripsijurusan
        ]);
        return back();
    }
}
