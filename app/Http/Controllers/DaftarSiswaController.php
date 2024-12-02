<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DaftarSiswaController extends Controller
{
    public function daftarsiswa()
    {
        $ur = Auth::user()->name;
        $profile = DB::table('profile_guru')
                ->join('pas_foto_guru', 'profile_guru.no_anggota', '=', 'pas_foto_guru.no_anggota')
                ->join('entertiment_guru', 'profile_guru.no_anggota', '=', 'entertiment_guru.no_anggota')
                ->join('cv_guru', 'profile_guru.no_anggota', '=', 'cv_guru.no_anggota')
                ->where('user', $ur)
                ->get();
        return view('admin_guru.daftar_siswa.index', compact('profile'));
    }
}
