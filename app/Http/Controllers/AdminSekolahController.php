<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminSekolahController extends Controller
{
    public function akreditasi()
    {
        $user = Auth::user()->name;
        $admin = DB::table('profile_admin')->where('user', $user)->get();
        $data = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        $akreditasi = DB::table('akreditasi')
                    ->join('profile_admin', 'akreditasi.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        $mapel = DB::table('mata_pelajaran')
                    ->join('profile_admin', 'mata_pelajaran.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->where('no_akreditasi', "")
                    ->orderBy('nama_mapel', 'ASC')
                    ->get();
        return view('admin_sekolah.guru.akreditasi_sekolah', compact('data', 'akreditasi', 'mapel'));
    }
    public function mapel()
    {
        $user = Auth::user()->name;
        $admin = DB::table('profile_admin')->where('user', $user)->get();
        $data = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        $mapel = DB::table('mata_pelajaran')
                    ->join('profile_admin', 'mata_pelajaran.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        foreach($admin as $a){
            $guru = DB::table('profile_guru')
                        ->where('npsn', $a->npsn)
                        ->where('status', 'DITERIMA')
                        ->get();
        }
        return view('admin_sekolah.guru.pengelolaan_mapel', compact('data', 'mapel', 'guru'));
    }
    public function kelas()
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        $kelas = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->join('kelas', 'daftar_sekolah.npsn', '=', 'kelas.npsn')
                    ->where('user', $user)
                    ->orderBy('urutan', 'ASC')
                    ->orderBy('abjad', 'ASC')
                    ->get();
        return view('admin_sekolah.siswa.kelas', compact('data', 'kelas'));
    }
    public function jurusan()
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        $jurusan = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->join('jurusan', 'daftar_sekolah.npsn', '=', 'jurusan.npsn')
                    ->where('user', $user)
                    ->get();
        $kelas = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->join('kelas', 'daftar_sekolah.npsn', '=', 'kelas.npsn')
                    ->where('user', $user)
                    ->where('no_jurusan', "")
                    ->orderBy('urutan', 'ASC')
                    ->orderBy('abjad', 'ASC')
                    ->get();
        $keljur = DB::table('kelas')
                    ->join('profile_admin', 'kelas.npsn', '=', 'profile_admin.npsn')
                    ->join('daftar_sekolah', 'kelas.npsn', '=', 'daftar_sekolah.npsn')
                    ->join('jurusan', 'kelas.no_jurusan', '=', 'jurusan.no_jurusan')
                    ->where('user', $user)
                    ->orderBy('urutan', 'ASC')
                    ->orderBy('abjad', 'ASC')
                    ->get();
        return view('admin_sekolah.siswa.jurusan', compact('data', 'jurusan', 'kelas', 'keljur'));
    }
    public function penerimaansiswa()
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        $pensis = DB::table('daftar_siswa')
                    ->join('profile_admin', 'daftar_siswa.npsn', '=', 'profile_admin.npsn')
                    ->join('pas_foto_siswa', 'daftar_siswa.no_siswa', '=', 'pas_foto_siswa.no_siswa')
                    ->where('profile_admin.user', $user)
                    ->where('status_siswa', 'BELUM DITERIMA')
                    ->where('kelas_siswa', '')
                    ->get();
        return view('admin_sekolah.siswa.penerimaan_siswa', compact('data', 'pensis'));
    }
    public function daftarsiswa()
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
                    ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->get();
        $datasiswa = DB::table('daftar_siswa')
                    ->join('profile_admin', 'daftar_siswa.npsn', '=', 'profile_admin.npsn')
                    ->join('kelas', 'daftar_siswa.kelas_siswa', '=', 'kelas.no_kelas')
                    ->join('jurusan', 'daftar_siswa.jurusan_siswa', '=', 'jurusan.no_jurusan')
                    ->where('profile_admin.user', $user)
                    ->where('status_siswa', 'DITERIMA')
                    ->orderBy('urutan', 'ASC')
                    ->orderBy('nama_siswa', 'ASC')
                    ->get();
        $kelas = DB::table('kelas')
                    ->join('profile_admin', 'kelas.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->orderBy('urutan', 'ASC')
                    ->get()
                    ->groupBy('tingkat');
        $jurusan = DB::table('jurusan')
                    ->join('profile_admin', 'jurusan.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->orderBy('nama_jurusan', 'ASC')
                    ->get();
        $abjad = DB::table('kelas')
                    ->join('profile_admin', 'kelas.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->orderBy('abjad', 'ASC')
                    ->get()
                    ->groupBy('abjad');
                    // return $datasiswa;
        return view('admin_sekolah.siswa.daftar_siswa', compact('data', 'datasiswa', 'kelas', 'jurusan', 'abjad'));
    }
    public function jadwalkegiatan()
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
            ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
            ->where('user', $user)
            ->get();
        return view('admin_sekolah.sekolah.jadwal_kegiatan', compact('data'));
    }
    public function jadwalpelajaran()
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
                    ->get();
        $jurusan = DB::table('jurusan')
                    ->join('profile_admin', 'jurusan.npsn', '=', 'profile_admin.npsn')
                    ->where('user', $user)
                    ->orderBy('nama_jurusan', 'ASC')
                    ->get();
        return view('admin_sekolah.sekolah.jadwal_pelajaran', compact('data', 'kelas', 'jurusan'));
    }
    public function daftarguru()
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
            ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
            ->where('user', $user)
            ->get();
        $daftar_guru = DB::table('profile_admin')
                            ->join('profile_guru', 'profile_admin.npsn', '=', 'profile_guru.npsn')
                            ->where('profile_admin.user', $user)
                            ->where('profile_guru.status', "DITERIMA")
                            ->get();
        return view('admin_sekolah.sekolah.daftar_guru', compact('data', 'daftar_guru'));
    }

    public function fasilitassekolah()
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
            ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
            ->where('user', $user)
            ->get();
        $edit = DB::table('fasilitas_umum')
            ->join('profile_admin', 'fasilitas_umum.npsn', '=', 'profile_admin.npsn')
            // ->join('gambar_fasilitas_umum', 'fasilitas_umum.no_fasilitas', '=', 'gambar_fasilitas_umum.no_fasilitas')
            //
            ->where('user', $user)
            ->get();
        $tambahan = DB::table('fasilitas_tambahan')
            ->join('profile_admin', 'fasilitas_tambahan.npsn', '=', 'profile_admin.npsn')
            ->where('user', $user)
            ->get();
        return view('admin_sekolah.sekolah.fasilitas', compact('data', 'edit', 'tambahan',));
    }
    public function profilesekolah()
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
            ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
            ->join('grub_daftar_sekolah', 'daftar_sekolah.grub', '=', 'grub_daftar_sekolah.grub')
            ->join('gambar_profile_daftar_sekolah', 'daftar_sekolah.npsn', '=', 'gambar_profile_daftar_sekolah.npsn')
            ->where('user', $user)
            ->get();
        $kelas = DB::table('grub_daftar_sekolah')->get();
        return view('admin_sekolah.sekolah.profile_sekolah', compact('data', 'kelas'));
    }
    public function updatebio(Request $request, $no_anggota)
    {
        DB::table('profile_admin')->where('no_anggota', $no_anggota)->update([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat,
            'tanggal_lahir' => $request->tgl,
            'no_hp' => $request->nohp,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);
        return back();
    }
    public function updatepp(Request $request, $no_anggota)
    {
        $this->validate($request, [
            'pp' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('pp');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'gambar/profile_admin/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('foto_profile_admin')->where('no_anggota', $no_anggota)->update([
            'gambar' => $nama_file
        ]);
        return back();
    }
    public function profile()
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
            ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
            ->where('user', $user)
            ->get();
        $foto = DB::table('foto_profile_admin')
            ->join('profile_admin', 'foto_profile_admin.no_anggota', '=', 'profile_admin.no_anggota')
            ->where('user', $user)
            ->get();
        return view('admin_sekolah.menu.profile', compact('data', 'foto'));
    }
    public function index()
    {
        $user = Auth::user()->name;
        $data = DB::table('daftar_sekolah')
            ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
            ->where('user', $user)
            ->get();
        $foto = DB::table('foto_profile_admin')
            ->join('profile_admin', 'foto_profile_admin.no_anggota', '=', 'profile_admin.no_anggota')
            ->where('user', $user)
            ->get();
        return view('admin_sekolah.menu.profile', compact('data', 'foto'));
    }
}
//
