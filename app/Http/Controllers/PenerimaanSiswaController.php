<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PenerimaanSiswaController extends Controller
{
    public function tolaksiswa($no_siswa)
    {
        $t = "DITOLAK";
        DB::table('daftar_siswa')->where('no_siswa', $no_siswa)->update([
            'status_siswa'=>$t
        ]);
        return redirect('/admin/sekolah/penerimaan_siswa');
    }
    public function terimasiswa($no_siswa, $jurusan_siswa)
    {
        $user = Auth::user()->name;
        $s = "DITERIMA";
        $terima = DB::table('profile_admin')
                    ->join('kelas', 'profile_admin.npsn', '=', 'kelas.npsn')
                    ->where('user', $user)
                    ->where('no_jurusan', $jurusan_siswa)
                    ->orderBy('urutan', "ASC")
                    ->orderBy('abjad', "ASC")
                    ->get();
        $f = 0;
        foreach ($terima as $t) {
            if (++$f >1) break; {
                $i = $t->no_kelas;
                DB::table('daftar_siswa')->where('no_siswa', $no_siswa)->update([
                    'status_siswa'=>$s,
                    'kelas_siswa'=>$i
                ]);
            }
        }
        return redirect('/admin/sekolah/penerimaan_siswa');
    }
    public function lihatsiswa($no_siswa)
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        $pensis = DB::table('daftar_siswa')
                    ->join('profile_admin', 'daftar_siswa.npsn', '=', 'profile_admin.npsn')
                    ->join('pas_foto_siswa', 'daftar_siswa.no_siswa', '=', 'pas_foto_siswa.no_siswa')
                    ->join('alamat_siswa', 'daftar_siswa.no_siswa', '=', 'alamat_siswa.no_siswa')
                    ->join('berkas_pendaftaran_siswa', 'daftar_siswa.no_siswa', '=', 'berkas_pendaftaran_siswa.no_siswa')
                    ->where('profile_admin.user', $user)
                    ->where('status_siswa', 'BELUM DITERIMA')
                    ->where('daftar_siswa.no_siswa', $no_siswa)
                    ->get();
        return view('admin_sekolah.siswa.lihat_siswa', compact('data', 'pensis'));
    }
    public function terimasemuasiswa($npsn)
    {
        $sts = "DITERIMA";
        $stsw = "BELUM DITERIMA";
        DB::table('daftar_siswa')
                ->where('npsn', $npsn)
                ->where('status_siswa', $stsw)
                ->update([
                    'status_siswa'=>$sts
                ]);
        return back();
    }
}
