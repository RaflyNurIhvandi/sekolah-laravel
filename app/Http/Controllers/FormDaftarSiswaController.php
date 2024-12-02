<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FormDaftarSiswaController extends Controller
{
    public function daftarsekolahsiswa(Request $request)
    {
        $statussiswa = "BELUM DITERIMA";
        $nosiswa = "SS".date("YmdHis");
        $nofotosiswa = "FS".date("YmdHis");
        $noalamatsiswa = "AS".date("YmdHis");
        $nowali = "WS".date("YmdHis");
        $noalamatwali = "AWS".date("YmdHis");
        $noberkas = "BS".date("YmdHis");
        $kosong = "";
        DB::table('daftar_siswa')->insert([
            'sekolah_asal_siswa'=>$request->sekolahasal,
            'no_anggota_siswa'=>$request->no_ang,
            'kelas_siswa'=>$kosong,
            'user'=>$request->user,
            'status_siswa'=>$statussiswa,
            'no_siswa'=>$nosiswa,
            'nama_siswa'=>$request->nama,
            'nisn'=>$request->nisn,
            'jenis_kelamin_siswa'=>$request->jeniskelamin,
            'tempat_lahir_siswa'=>$request->tempatlahir,
            'tanggal_lahir_siswa'=>$request->tgllahir,
            'agama_siswa'=>$request->agama,
            'kewarganegaraan_siswa'=>$request->wn,
            'anak_ke'=>$request->anakke,
            'no_hp_siswa'=>$request->nohp,
            'email_siswa'=>$request->email,
            'nama_sekolah_siswa'=>$request->sekolahygdituju,
            'npsn'=>$request->npsn,
            'jurusan_siswa'=>$request->jurusan,
            'verifikasi_data'=>$request->verifinput,
            'verifikasi_patuh'=>$request->verifpatuh
        ]);
        $this->validate($request, [
            'pasfoto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $fl = $request->file('pasfoto');
        $nm_file = time()."_".$fl->getClientOriginalName();
        $tujuan_up = 'pendaftaran_siswa/pas_foto_siswa/';
        $fl->move($tujuan_up, $nm_file);
        DB::table('pas_foto_siswa')->insert([
            'no_siswa'=>$nosiswa,
            'no_foto'=>$nofotosiswa,
            'gambar_siswa'=>$nm_file
        ]);
        DB::table('alamat_siswa')->insert([
            'no_siswa'=>$nosiswa,
            'no_alamat_siswa'=>$noalamatsiswa,
            'alamat_siswa'=>$request->alamat,
            'kota_siswa'=>$request->kota,
            'provinsi_siswa'=>$request->provinsi,
            'kode_pos_siswa'=>$request->kodepos,
            'negara_siswa'=>$request->negara
        ]);
        DB::table('daftar_wali_siswa')->insert([
            'no_wali'=>$nowali,
            'no_siswa'=>$nosiswa,
            'nama_wali'=>$request->nama_orangtua,
            'jenis_kelamin_wali'=>$request->jeniskelaminortu,
            'tempat_lahir_wali'=>$request->tempatlahirortu,
            'tanggal_lahir_wali'=>$request->tgllahirortu,
            'hubungan_keluarga'=>$request->hubungan_keluarga,
            'kewarganegaraan_wali'=>$request->wnortu,
            'agama_wali'=>$request->agamaortu,
            'pekerjaan_wali'=>$request->pekerjaan,
            'no_hp_wali'=>$request->nohportu
        ]);
        DB::table('alamat_wali_siswa')->insert([
            'no_siswa'=>$nosiswa,
            'no_alamat_wali'=>$noalamatwali,
            'alamat_wali'=>$request->alamatortu,
            'kota_wali'=>$request->kotaortu,
            'provinsi_wali'=>$request->provinsiortu,
            'kode_pos_wali'=>$request->kodeposortu,
            'negara_wali'=>$request->negaraortu
        ]);
        $this->validate($request, [
            'ktportu' => 'required|mimes:pdf,zip',
            'kk' => 'required|mimes:pdf,zip',
            'akta' => 'required|mimes:pdf,zip',
            'nilairapor' => 'required|mimes:pdf,zip'
        ]);
        // ktp
        $ktp = $request->file('ktportu');
        $nama_ktp = time()."_".$ktp->getClientOriginalName();
        $tujuan_ktp = 'pendaftaran_siswa/berkas_siswa/ktp_ortu/';
        $ktp->move($tujuan_ktp, $nama_ktp);

        // kk
        $kk = $request->file('kk');
        $nama_kk = time()."_".$kk->getClientOriginalName();
        $tujuan_kk = 'pendaftaran_siswa/berkas_siswa/kartu_keluarga/';
        $kk->move($tujuan_kk, $nama_kk);

        // akta
        $akta = $request->file('akta');
        $nama_akta = time()."_".$akta->getClientOriginalName();
        $tujuan_akta = 'pendaftaran_siswa/berkas_siswa/akta_kelahiran/';
        $akta->move($tujuan_akta, $nama_akta);

        // rapor
        $nilairapor = $request->file('nilairapor');
        $nama_nilairapor = time()."_".$nilairapor->getClientOriginalName();
        $tujuan_nilairapor = 'pendaftaran_siswa/berkas_siswa/nilai_rapor/';
        $nilairapor->move($tujuan_nilairapor, $nama_nilairapor);
        DB::table('berkas_pendaftaran_siswa')->insert([
            'no_berkas'=>$noberkas,
            'no_siswa'=>$nosiswa,
            'ktp_wali'=>$nama_ktp,
            'kartu_keluarga'=>$nama_kk,
            'akta_kelahiran'=>$nama_akta,
            'nilai_rapor'=>$nama_nilairapor
        ]);
        return redirect('/status/pendaftaran/siswa');
    }
    public function daftarsekolah($kode_sekolah)
    {
        $user = Auth::user()->name;
        $psl = DB::table('daftar_sekolah')->where('kode_sekolah', $kode_sekolah)->get();
        $jurusan = DB::table('jurusan')
                    ->join('daftar_sekolah', 'jurusan.npsn', '=', 'daftar_sekolah.npsn')
                    ->where('kode_sekolah', $kode_sekolah)
                    ->get();
        $no_anggota = DB::table('profile_siswa')->where('user', $user)->get();
        $gbr = DB::table('daftar_sekolah')
                    ->join('gambar_profile_daftar_sekolah', 'daftar_sekolah.npsn', '=', 'gambar_profile_daftar_sekolah.npsn')
                    ->where('kode_sekolah', $kode_sekolah)
                    ->get();
        return view('sekolah.form_daftar_siswa',compact('psl', 'jurusan', 'no_anggota', 'gbr'));
    }
    public function lihatsekolah($kode_sekolah)
    {
        $psekolah = DB::table('daftar_sekolah')
                    ->join('gambar_profile_daftar_sekolah', 'daftar_sekolah.npsn', '=', 'gambar_profile_daftar_sekolah.npsn')
                    ->where('kode_sekolah', $kode_sekolah)
                    ->get();
        $fumum = DB::table('fasilitas_umum')
                    ->join('daftar_sekolah', 'fasilitas_umum.npsn', '=', 'daftar_sekolah.npsn')
                    ->join('gambar_fasilitas', 'fasilitas_umum.no_fasilitas', '=', 'gambar_fasilitas.no_fasilitas')
                    ->where('kode_sekolah', $kode_sekolah)
                    ->get();
        $ftbh = DB::table('fasilitas_tambahan')
                    ->join('daftar_sekolah', 'fasilitas_tambahan.npsn', '=', 'daftar_sekolah.npsn')
                    ->join('gambar_fasilitas', 'fasilitas_tambahan.no_fasilitas', '=', 'gambar_fasilitas.no_fasilitas')
                    ->where('kode_sekolah', $kode_sekolah)
                    ->get();
        return view('sekolah.view_profil_sekolah', compact('psekolah', 'ftbh', 'fumum'));
    }
    public function masuksekolah()
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
        $sekolah = DB::table('daftar_sekolah')
                    ->join('gambar_profile_daftar_sekolah', 'daftar_sekolah.npsn', '=', 'gambar_profile_daftar_sekolah.npsn')
                    ->get();
        $prof = DB::table('daftar_siswa')->where('user', $user)->get();
        foreach($prof as $p){
            if($p->status_siswa == 'DITERIMA'){
                return view('siswa.status_penerimaan',compact('sis', 'icn'));
            } else if ($p->status_siswa == 'DITOLAK'){
                return view('siswa.status_penerimaan',compact('sis', 'icn'));
            } else if($p->status_siswa == 'BELUM DITERIMA') {
                return view('siswa.status_penerimaan',compact('sis', 'icn'));
            } else {
                return view('sekolah.pilihan_sekolah', compact('sekolah'));
            }
        }
    }
    public function formdaftar(Request $request)
    {
        DB::table('profile_siswa')->where('no_anggota', $request->no)->delete();
        DB::table('profile_siswa')->insert([
            'no_anggota'=>$request->no,
            'nama_siswa'=>$request->nama,
            'tempat_lahir'=>$request->tempatlahir,
            'tanggal_lahir'=>$request->tgllahir,
            'nisn'=>$request->nisn,
            'user'=>$request->user,
            'no_hp'=>$request->nohp,
            'email'=>$request->email,
            'umur'=>$request->umur,
            'genre'=>$request->genre,
            'deskripsi'=>$request->des,
            'alamat'=>$request->alamat
        ]);
        return redirect('/masuk/sekolah');
    }
    public function indexform()
    {
        return view('daftarkan_siswa');
    }
}
