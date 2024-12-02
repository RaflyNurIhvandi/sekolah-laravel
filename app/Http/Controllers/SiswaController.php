<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function database()
    {
        $user = Auth::user()->name;
        $datasiswa = DB::table('daftar_siswa')
                    ->join('profile_admin', 'daftar_siswa.npsn', '=', 'profile_admin.npsn')
                    ->join('kelas', 'daftar_siswa.kelas_siswa', '=', 'kelas.no_kelas')
                    ->join('jurusan', 'daftar_siswa.jurusan_siswa', '=', 'jurusan.no_jurusan')
                    ->where('profile_admin.user', $user)
                    ->where('status_siswa', 'DITERIMA')
                    ->orderBy('urutan', 'ASC')
                    ->orderBy('abjad', 'ASC')
                    ->orderBy('nama_siswa', 'ASC')
                    ->get();
        // $tes = DB::table('daftar_siswa')->get();
        return response()->json($datasiswa);
    }
    public function keluarkansiswa($no_siswa)
    {
        $status = "DIKELUARKAN";
        DB::table('daftar_siswa')->where('no_siswa', $no_siswa)->update([
            'status_siswa'=>$status
        ]);
        return redirect('/admin/sekolah/daftar_siswa');
    }
    public function lihatsiswa($no_siswa)
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        $dtsiswa = DB::table('daftar_siswa')
                    ->join('daftar_wali_siswa', 'daftar_siswa.no_siswa', '=', 'daftar_wali_siswa.no_siswa')
                    ->join('alamat_siswa', 'daftar_siswa.no_siswa', '=', 'alamat_siswa.no_siswa')
                    ->join('alamat_wali_siswa', 'daftar_siswa.no_siswa', '=', 'alamat_wali_siswa.no_siswa')
                    ->join('berkas_pendaftaran_siswa', 'daftar_siswa.no_siswa', '=', 'berkas_pendaftaran_siswa.no_siswa')
                    ->join('pas_foto_siswa', 'daftar_siswa.no_siswa', '=', 'pas_foto_siswa.no_siswa')
                    ->where('daftar_siswa.no_siswa', $no_siswa)
                    ->get();
        return view('admin_sekolah.siswa.lihat_data_siswa', compact('data', 'dtsiswa'));
    }
}
