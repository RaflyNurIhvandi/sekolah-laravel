<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarkanSekolahController extends Controller
{
    public function daftaradmin(Request $request)
    {
        DB::table('profile_admin')->insert([
            'nama'=>$request->nama,
            'no_anggota'=>$request->noanggota,
            'tempat_lahir'=>$request->tempat,
            'tanggal_lahir'=>$request->tgl,
            'no_hp'=>$request->nohp,
            'email'=>$request->email,
            'alamat'=>$request->alamat,
            'npsn'=>$request->npsn,
            'user'=>$request->user,
        ]);
        $no = "DS".date("YmdHis");
        DB::table('daftar_sekolah')->insert([
            'nama_sekolah'=>$request->namasekolah,
            'npsn'=>$request->npsn,
            'alamat_sekolah'=>$request->alamat,
            'grub'=>$request->tingkatsekolah,
            'kode_sekolah'=>$no,
        ]);
        DB::table('foto_profile_admin')->insert([
            'no_anggota'=>$request->noanggota
        ]);
        $no_gbr_profile = "GPS".date("YmdHis");
        DB::table('gambar_profile_daftar_sekolah')->insert([
            'no_gambar_profile'=>$no_gbr_profile,
            'npsn'=>$request->npsn,
            'gambar_profile'=>''
        ]);
        return redirect('/admin/sekolah');
    }
    public function formdaftar()
    {
        return view('daftarkan_sekolah');
    }
}
