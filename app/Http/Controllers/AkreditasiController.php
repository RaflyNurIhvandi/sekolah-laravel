<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AkreditasiController extends Controller
{
    public function hapusakreditasi($no_akreditasi)
    {
        $isi = "";
        DB::table('akreditasi')->where('no_akreditasi', $no_akreditasi)->delete();
        DB::table('mata_pelajaran')->where('no_akreditasi', $no_akreditasi)->update([
            'no_akreditasi'=>$isi
        ]);
        return back();
    }
    public function editakreditasi(Request $request, $no_akreditasi)
    {
        DB::table('akreditasi')->where('no_akreditasi', $no_akreditasi)->update([
            'nama_akreditasi'=>$request->namaakreditasi,
            'min_a'=>$request->nilai_terendah_a,
            'max_a'=>$request->nilai_tertinggi_a,
            'min_b'=>$request->nilai_terendah_b,
            'max_b'=>$request->nilai_tertinggi_b,
            'min_c'=>$request->nilai_terendah_c,
            'max_c'=>$request->nilai_tertinggi_c,
            'min_d'=>$request->nilai_terendah_d,
            'max_d'=>$request->nilai_tertinggi_d,
        ]);
        return back();
    }
    public function addmapel(Request $request)
    {
        $nomapel = $request->nomapel;
        $noakre = $request->noakreditasi;
        DB::table('mata_pelajaran')->where('no_mapel', $nomapel)->update([
            'no_akreditasi'=>$noakre
        ]);
        return back();
    }
    public function hapusmapel($no_mapel)
    {
        $isi = "";
        DB::table('mata_pelajaran')->where('no_mapel', $no_mapel)->update([
            'no_akreditasi'=>$isi
        ]);
        return back();
    }
    public function dataakreditasi()
    {
        $user = Auth::user()->name;
        $data = DB::table('mata_pelajaran')
                    ->join('akreditasi', 'mata_pelajaran.no_akreditasi', '=', 'akreditasi.no_akreditasi')
                    ->join('profile_admin', 'mata_pelajaran.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->orderBy('nama_mapel', 'ASC')
                    ->get();
        return response()->json($data);
    }
    public function addakre(Request $request)
    {
        $no = "AKS".date("YmdHis");
        DB::table('akreditasi')->insert([
            'no_akreditasi'=>$no,
            'npsn'=>$request->npsn,
            'nama_akreditasi'=>$request->namaakreditasi,
            'min_a'=>$request->nilai_terendah_a,
            'max_a'=>$request->nilai_tertinggi_a,
            'min_b'=>$request->nilai_terendah_b,
            'max_b'=>$request->nilai_tertinggi_b,
            'min_c'=>$request->nilai_terendah_c,
            'max_c'=>$request->nilai_tertinggi_c,
            'min_d'=>$request->nilai_terendah_d,
            'max_d'=>$request->nilai_tertinggi_d
        ]);
        return back();
    }
}
