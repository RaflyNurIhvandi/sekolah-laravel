<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InputNilaiSiswaController extends Controller
{
    public function inputnilai(Request $request)
    {
        DB::table('nilai_siswa')->insert([
            'no_jurusan'=>$request->jurusan,
            'tingkat_kelas'=>$request->kelas,
            'abjad_kelas'=>$request->abjad,
            'no_siswa'=>$request->nama_siswa,
            'no_guru'=>$request->nama_guru,
            'no_mapel'=>$request->nama_mapel,
            'nilai_absen'=>$request->nilai_absen,
            'nilai_tugas'=>$request->nilai_tugas,
            'nilai_kuis'=>$request->nilai_kuis,
            'tahun_ajaran'=>$request->tahun_ajaran,
            'semester'=>$request->semester,
            'nilai_uts'=>$request->nilai_uts,
            'nilai_uas'=>$request->nilai_uas,
            'nilai_huruf'=>$request->nilai_huruf,
            'rata_rata'=>$request->rata_rata,
            'keterangan'=>$request->keterangan,
        ]);
        return back();
    }
    public function daftarakr()
    {
        $user = Auth::user()->name;
        $data = DB::table('akreditasi')
                ->join('profile_guru', 'akreditasi.npsn', '=', 'profile_guru.npsn')
                ->join('mata_pelajaran', 'akreditasi.no_akreditasi', '=', 'mata_pelajaran.no_akreditasi')
                ->where('user', $user)
                ->get();
        return response()->json($data);
    }
    public function mapel()
    {
        $user = Auth::user()->name;
        $dataabjad = DB::table('mata_pelajaran')
                ->join('profile_guru', 'mata_pelajaran.npsn', '=', 'profile_guru.npsn')
                ->where('user', $user)
                ->orderBy('nama_mapel', 'ASC')
                ->get();
        return response()->json($dataabjad);
    }
    public function daftarkelas()
    {
        $user = Auth::user()->name;
        $dataabjad = DB::table('kelas')
                ->join('profile_guru', 'kelas.npsn', '=', 'profile_guru.npsn')
                ->where('user', $user)
                ->orderBy('tingkat', 'ASC')
                ->get();
        return response()->json($dataabjad);
    }
    public function abjadkelas()
    {
        $user = Auth::user()->name;
        $dataabjad = DB::table('kelas')
                ->join('profile_guru', 'kelas.npsn', '=', 'profile_guru.npsn')
                ->where('user', $user)
                ->orderBy('abjad', 'ASC')
                ->get();
        return response()->json($dataabjad);
    }
    public function daftarsiswa()
    {
        $user = Auth::user()->name;
        $datasiswa = DB::table('daftar_siswa')
                ->join('profile_guru', 'daftar_siswa.npsn', '=', 'profile_guru.npsn')
                ->join('kelas', 'daftar_siswa.kelas_siswa', '=', 'kelas.no_kelas')
                ->join('jurusan', 'daftar_siswa.jurusan_siswa', '=', 'jurusan.no_jurusan')
                ->where('profile_guru.user', $user)
                ->where('status_siswa', 'DITERIMA')
                ->orderBy('urutan', 'ASC')
                ->orderBy('abjad', 'ASC')
                ->orderBy('nama_siswa', 'ASC')
                ->get();
        return response()->json($datasiswa);
    }
    public function index()
    {
        $ur = Auth::user()->name;
        $profile = DB::table('profile_guru')
                ->join('pas_foto_guru', 'profile_guru.no_anggota', '=', 'pas_foto_guru.no_anggota')
                ->join('entertiment_guru', 'profile_guru.no_anggota', '=', 'entertiment_guru.no_anggota')
                ->join('cv_guru', 'profile_guru.no_anggota', '=', 'cv_guru.no_anggota')
                ->where('user', $ur)
                ->get();
        $jurusan = DB::table('jurusan')
                ->join('profile_guru', 'jurusan.npsn', '=', 'profile_guru.npsn')
                ->where('user', $ur)
                ->orderBy('nama_jurusan', 'ASC')
                ->get();
        $guru = DB::table('profile_guru')
                ->join('daftar_sekolah', 'profile_guru.npsn', '=', 'daftar_sekolah.npsn')
                ->where('user', $ur)
                ->orderBy('nama', 'ASC')
                ->get();
        return view('admin_guru.input_nilai_siswa.index', compact('profile', 'jurusan', 'guru'));
    }
}
