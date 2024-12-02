<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StatusSiswaController extends Controller
{
    public function cetak($no_siswa)
    {
        $sis = DB::table('daftar_siswa')
                    ->join('alamat_siswa', 'daftar_siswa.no_siswa', '=', 'alamat_siswa.no_siswa')
                    ->join('jurusan', 'daftar_siswa.jurusan_siswa', '=', 'jurusan.no_jurusan')
                    ->join('daftar_sekolah', 'daftar_siswa.npsn', '=', 'daftar_sekolah.npsn')
                    ->where('daftar_siswa.no_siswa', $no_siswa)
                    ->get();
        $icn = DB::table('daftar_siswa')
                    ->join('gambar_profile_daftar_sekolah', 'daftar_siswa.npsn', '=', 'gambar_profile_daftar_sekolah.npsn')
                    ->where('daftar_siswa.no_siswa', $no_siswa)
                    ->get();
        return view('siswa.cetak_bukti_penerimaan', compact('sis', 'icn'));
    }
    public function index()
    {
        $user = Auth::user()->name;
        $sis = DB::table('daftar_siswa')
                    ->join('profile_siswa', 'daftar_siswa.no_anggota_siswa', '=', 'profile_siswa.no_anggota')
                    ->join('daftar_sekolah', 'daftar_siswa.npsn', '=', 'daftar_sekolah.npsn')
                    ->join('jurusan', 'daftar_siswa.jurusan_siswa', '=', 'jurusan.no_jurusan')
                    ->where('profile_siswa.user', $user)
                    ->get();
        $icn = DB::table('daftar_siswa')
                    ->join('gambar_profile_daftar_sekolah', 'daftar_siswa.npsn', '=', 'gambar_profile_daftar_sekolah.npsn')
                    ->where('daftar_siswa.user', $user)
                    ->get();
        return view('siswa.status_penerimaan',compact('sis', 'icn'));
    }
}
