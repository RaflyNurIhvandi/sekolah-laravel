<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JadwalPelajaranController extends Controller
{
    public function datakelas()
    {
        $user = Auth::user()->name;
        $data = DB::table('kelas')
                ->join('profile_admin', 'kelas.npsn', '=', 'profile_admin.npsn')
                ->where('user', $user)
                ->orderBy('tingkat', 'ASC')
                ->get();
        return response()->json($data);
    }
    public function dataabjad()
    {
        $user = Auth::user()->name;
        $data = DB::table('kelas')
                ->join('profile_admin', 'kelas.npsn', '=', 'profile_admin.npsn')
                ->where('user', $user)
                ->orderBy('tingkat', 'ASC')
                ->orderBy('abjad', 'ASC')
                ->get();
        return response()->json($data);
    }
    public function mapelkelas()
    {
        $user = Auth::user()->name;
        $admin = DB::table('profile_admin')->where('user', $user)->get();
        foreach($admin as $a){
            $data = DB::table('mata_pelajaran')
                        ->join('profile_guru', 'mata_pelajaran.no_guru_mapel', '=', 'profile_guru.no_anggota')
                        ->where('mata_pelajaran.npsn', $a->npsn)
                        ->get();
        }
        return response()->json($data);
    }
    public function hapuskelas($no_kelas)
    {
        DB::table('daftar_kelas')->where('no_kelas', $no_kelas)->delete();
        DB::table('jadwal_pelajaran')->where('no_kelas', $no_kelas)->delete();
        return back();
    }
    public function hapusmapel($no_jadwal)
    {
        DB::table('jadwal_pelajaran')->where('no_jadwal', $no_jadwal)->delete();
        return back();
    }
    public function updatemapel(Request $request, $no_jadwal)
    {
        DB::table('jadwal_pelajaran')->where('no_jadwal', $no_jadwal)->update([
            'hari'=>$request->hari,
            'mapel'=>$request->mapel,
            'jam_mulai'=>$request->mulaijam,
            'jam_selesai'=>$request->selesaijam,
            'nama_guru'=>$request->namaguru,
            'no_urut_jadwal'=>$request->no
        ]);
        return back();
    }
    public function editmapel($no_jadwal)
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        $kelas = DB::table('daftar_kelas')
                    ->join('daftar_sekolah', 'daftar_kelas.npsn', '=', 'daftar_sekolah.npsn')
                    ->join('profile_admin', 'daftar_kelas.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        $mapel = DB::table('jadwal_pelajaran')->where('no_jadwal', $no_jadwal)->get();
        return view('admin_sekolah.sekolah.edit.edit_mapel', compact('data','kelas', 'mapel'));
    }
    public function tambahjadwal(Request $request)
    {
        $nojadwal = "JK".date("YmdHis");
        DB::table('jadwal_pelajaran')->insert([
            'hari'=>$request->hari,
            'mapel'=>$request->mapel,
            'jam_mulai'=>$request->mulaijam,
            'jam_selesai'=>$request->selesaijam,
            'nama_guru'=>$request->namaguru,
            'no_urut_jadwal'=>$request->no,
            'no_kelas'=>$request->nokelas,
            'no_jadwal'=>$nojadwal
        ]);
        return back();
    }
    public function updatekelas(Request $request, $no_kelas)
    {
        DB::table('daftar_kelas')->where('no_kelas', $no_kelas)->update([
            'jurusan'=>$request->jurusan,
            'tingkat_kelas'=>$request->tingkatkelas,
            'abjad_kelas'=>$request->abjadkelas,
            'catatan'=>$request->catatan
        ]);
        return back();
    }
    public function editkelas($no_kelas)
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        $kelas = DB::table('daftar_kelas')
                    ->join('jurusan', 'daftar_kelas.jurusan', '=', 'jurusan.no_jurusan')
                    ->join('profile_admin', 'daftar_kelas.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->where('no_kelas', $no_kelas)
                    ->get();
        $senin = DB::table('daftar_kelas')
                    ->join('jadwal_pelajaran', 'daftar_kelas.no_kelas', '=', 'jadwal_pelajaran.no_kelas')
                    ->join('profile_admin', 'daftar_kelas.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->where('hari', 'senin')
                    ->where('jadwal_pelajaran.no_kelas', $no_kelas)
                    ->orderBy('no_urut_jadwal', 'asc')
                    ->get();
        $selasa = DB::table('daftar_kelas')
                    ->join('jadwal_pelajaran', 'daftar_kelas.no_kelas', '=', 'jadwal_pelajaran.no_kelas')
                    ->join('profile_admin', 'daftar_kelas.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->where('hari', 'selasa')
                    ->where('jadwal_pelajaran.no_kelas', $no_kelas)
                    ->orderBy('no_urut_jadwal', 'asc')
                    ->get();
        $rabu = DB::table('daftar_kelas')
                    ->join('jadwal_pelajaran', 'daftar_kelas.no_kelas', '=', 'jadwal_pelajaran.no_kelas')
                    ->join('profile_admin', 'daftar_kelas.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->where('hari', 'rabu')
                    ->where('jadwal_pelajaran.no_kelas', $no_kelas)
                    ->orderBy('no_urut_jadwal', 'asc')
                    ->get();
        $kamis = DB::table('daftar_kelas')
                    ->join('jadwal_pelajaran', 'daftar_kelas.no_kelas', '=', 'jadwal_pelajaran.no_kelas')
                    ->join('profile_admin', 'daftar_kelas.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->where('hari', 'kamis')
                    ->where('jadwal_pelajaran.no_kelas', $no_kelas)
                    ->orderBy('no_urut_jadwal', 'asc')
                    ->get();
        $jumat = DB::table('daftar_kelas')
                    ->join('jadwal_pelajaran', 'daftar_kelas.no_kelas', '=', 'jadwal_pelajaran.no_kelas')
                    ->join('profile_admin', 'daftar_kelas.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->where('hari', 'jumat')
                    ->where('jadwal_pelajaran.no_kelas', $no_kelas)
                    ->orderBy('no_urut_jadwal', 'asc')
                    ->get();
        $sabtu = DB::table('daftar_kelas')
                    ->join('jadwal_pelajaran', 'daftar_kelas.no_kelas', '=', 'jadwal_pelajaran.no_kelas')
                    ->join('profile_admin', 'daftar_kelas.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->where('hari', 'sabtu')
                    ->where('jadwal_pelajaran.no_kelas', $no_kelas)
                    ->orderBy('no_urut_jadwal', 'asc')
                    ->get();
        $profadmin = DB::table('profile_admin')->where('user', $user)->get();
        foreach($profadmin as $p){
            $dafgur = DB::table('profile_guru')
                        ->where('npsn', $p->npsn)
                        ->where('status', 'DITERIMA')
                        ->get();
        }
        $jurusan = DB::table('jurusan')
                    ->join('profile_admin', 'jurusan.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->orderBy('nama_jurusan', 'ASC')
                    ->get();
        return view('admin_sekolah.sekolah.edit.jadwal_pelajaran', compact('dafgur', 'data', 'kelas', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'jurusan'));
    }
    public function tambahkelas(Request $request)
    {
        $nokelas = "DK".date("YmdHis");
        DB::table('daftar_kelas')->insert([
            'jurusan'=>$request->jurusan,
            'tingkat_kelas'=>$request->tingkatkelas,
            'npsn'=>$request->npsn,
            'abjad_kelas'=>$request->abjadkelas,
            'catatan'=>$request->catatan,
            'no_kelas'=>$nokelas
        ]);
        return back();
    }
}
