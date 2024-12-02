<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DaftarGuruController extends Controller
{
    public function tolakguru($no_anggota)
    {
        DB::table('profile_guru')->where('no_anggota', $no_anggota)->update([
            'status'=>'DITOLAK'
        ]);
        return back();
    }
    public function terimaguru($no_anggota)
    {
        DB::table('profile_guru')->where('no_anggota', $no_anggota)->update([
            'status'=>'DITERIMA'
        ]);
        return back();
    }
    public function pendaftaranguru()
    {
        $ur = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
            ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
            ->where('user', $ur)
            ->get();
        $guru = DB::table('profile_admin')
                    ->join('profile_guru', 'profile_admin.npsn', '=', 'profile_guru.npsn')
                    ->where('profile_admin.user', $ur)
                    ->where('profile_guru.status', 'BELUM DITERIMA')
                    ->get();
        $foto = DB::table('pas_foto_guru')->get();
        return view('admin_sekolah.sekolah.lihat.guru_belum_diterima', compact('data','guru', 'foto'));
    }
    public function lihatguru($no_anggota)
    {
        $ur = Auth::user()->name;
        $profile = DB::table('profile_guru')
                ->join('pas_foto_guru', 'profile_guru.no_anggota', '=', 'pas_foto_guru.no_anggota')
                ->join('entertiment_guru', 'profile_guru.no_anggota', '=', 'entertiment_guru.no_anggota')
                ->join('cv_guru', 'profile_guru.no_anggota', '=', 'cv_guru.no_anggota')
                ->where('profile_guru.no_anggota', $no_anggota)
                ->get();
        return view('admin_sekolah.sekolah.lihat.guru', compact('profile'));
    }
    public function daftarguru()
    {
        $ur = Auth::user()->name;
        $profile = DB::table('profile_guru')
                ->join('pas_foto_guru', 'profile_guru.no_anggota', '=', 'pas_foto_guru.no_anggota')
                ->join('entertiment_guru', 'profile_guru.no_anggota', '=', 'entertiment_guru.no_anggota')
                ->join('cv_guru', 'profile_guru.no_anggota', '=', 'cv_guru.no_anggota')
                ->where('user', $ur)
                ->get();
        return view('admin_guru.daftar_guru.index', compact('profile'));
    }
}
