<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GoSchoolController extends Controller
{
    public function index($no_siswa)
    {
        $siswa = DB::table('daftar_siswa')->where('no_siswa', $no_siswa)->get();
        foreach($siswa as $s){
            $kelas = DB::table('kelas')->where('no_kelas', $s->kelas_siswa)->get();
        }
        foreach($kelas as $k){
            $tingkat = $k->tingkat;
            $abjad = $k->abjad;
        }
        $jurusan = DB::table('daftar_kelas')->where('tingkat_kelas', $tingkat)->where('abjad_kelas', $abjad)->get();
        foreach($jurusan as $j){
            $nokls = $j->no_kelas;
        }
        $senin = DB::table('jadwal_pelajaran')
                    ->where('no_kelas', $nokls)
                    ->where('hari', 'senin')
                    ->orderBy('no_urut_jadwal', 'ASC')
                    ->get();
        $selasa = DB::table('jadwal_pelajaran')
                    ->where('no_kelas', $nokls)
                    ->where('hari', 'selasa')
                    ->orderBy('no_urut_jadwal', 'ASC')
                    ->get();
        $rabu = DB::table('jadwal_pelajaran')
                    ->where('no_kelas', $nokls)
                    ->where('hari', 'rabu')
                    ->orderBy('no_urut_jadwal', 'ASC')
                    ->get();
        $kamis = DB::table('jadwal_pelajaran')
                    ->where('no_kelas', $nokls)
                    ->where('hari', 'kamis')
                    ->orderBy('no_urut_jadwal', 'ASC')
                    ->get();
        $jumat = DB::table('jadwal_pelajaran')
                    ->where('no_kelas', $nokls)
                    ->where('hari', 'jumat')
                    ->orderBy('no_urut_jadwal', 'ASC')
                    ->get();
        $sabtu = DB::table('jadwal_pelajaran')
                    ->where('no_kelas', $nokls)
                    ->where('hari', 'sabtu')
                    ->orderBy('no_urut_jadwal', 'ASC')
                    ->get();
        $dafsis = DB::table('daftar_siswa')
                    ->join('alamat_siswa', 'daftar_siswa.no_siswa', '=', 'alamat_siswa.no_siswa')
                    ->join('daftar_wali_siswa', 'daftar_siswa.no_siswa', '=', 'daftar_wali_siswa.no_siswa')
                    ->join('alamat_wali_siswa', 'daftar_siswa.no_siswa', '=', 'alamat_wali_siswa.no_siswa')
                    ->join('pas_foto_siswa', 'daftar_siswa.no_siswa', '=', 'pas_foto_siswa.no_siswa')
                    ->where('daftar_siswa.no_siswa', $no_siswa)
                    ->get();
        $nilai = DB::table('nilai_siswa')->where('no_siswa', $no_siswa)->get();
        return view('siswa.go_school.index', compact('nilai', 'siswa', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'dafsis'));
    }
}
