<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function tambahprofile(Request $request)
    {
        $no = date("YmdHis");
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'gambar/profile/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('profile')->insert([
            'nama'=>$request->nama,
            'nisn'=>$request->nisn,
            'no_anggota'=>$no,
            'tempat_lahir'=>$request->tempat,
            'tanggal_lahir'=>$request->tgl,
            'status'=>$request->status,
            'email'=>$request->email,
            'alamat'=>$request->alamat,
            'user'=>$request->user,
            'gambar'=>$nama_file,
        ]);
        DB::table('daftar_siswa')->insert([
            'no_anggota_siswa'=>$no
        ]);
        DB::table('profile_siswa')->insert([
            'no_anggota'=>$no
        ]);
        return back();
    }
    public function editprofile(Request $request, $no_anggota)
    {
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'gambar/profile/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('profile')->where('no_anggota', $no_anggota)->update([
            'nama'=>$request->nama,
            'nisn'=>$request->nisn,
            'tempat_lahir'=>$request->tempat,
            'tanggal_lahir'=>$request->tgl,
            'status'=>$request->status,
            'email'=>$request->email,
            'alamat'=>$request->alamat,
            'gambar'=>$nama_file,
        ]);
        return back();
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $p = Auth::user()->name;
        $profile = DB::table('profile')->where('user', $p)->get();
        $guru = DB::table('profile')
                    ->join('profile_guru', 'profile.user', '=', 'profile_guru.user')
                    ->where('profile.user', $p)
                    ->get();
        $data = DB::table('profile')
                    ->join('profile_admin', 'profile.user', '=', 'profile_admin.user')
                    ->where('profile.user', $p)
                    ->get();
        $siswa = DB::table('profile')
                    ->join('profile_siswa', 'profile.user', '=', 'profile_siswa.user')
                    ->where('profile.user', $p)
                    ->get();
        $all = DB::table('profile')
                    ->join('profile_siswa', 'profile.no_anggota', '=', 'profile_siswa.no_anggota')
                    ->join('daftar_siswa', 'profile.no_anggota', '=', 'daftar_siswa.no_anggota_siswa')
                    ->where('profile.user', $p)
                    ->get();
        $sis = DB::table('daftar_siswa')
                    ->join('profile_siswa', 'daftar_siswa.no_anggota_siswa', '=', 'profile_siswa.no_anggota')
                    ->join('daftar_sekolah', 'daftar_siswa.npsn', '=', 'daftar_sekolah.npsn')
                    ->join('jurusan', 'daftar_siswa.jurusan_siswa', '=', 'jurusan.no_jurusan')
                    ->where('profile_siswa.user', $p)
                    ->get();
        $auth = DB::table('profile')->where('user', $p)->get();
        foreach($auth as $t){
            if($t->status == 'Siswa'){
                foreach($all as $a){
                    if($a->status_siswa == 'BELUM DITERIMA'){
                        return view('siswa.status_penerimaan', compact('profile', 'data', 'guru', 'siswa', 'sis'));
                    } else if($a->status_siswa == 'DITERIMA'){
                        return view('siswa.status_penerimaan', compact('profile', 'data', 'guru', 'siswa', 'sis'));
                    } else if($a->status_siswa == 'DITOLAK'){
                        return view('siswa.status_penerimaan', compact('profile', 'data', 'guru', 'siswa', 'sis'));
                    } else {
                        return view('home', compact('profile', 'data', 'guru', 'siswa', 'sis'));
                    }
                }
            } else if($t->status == 'Guru'){
                return view('home', compact('profile', 'data', 'guru', 'siswa', 'sis'));
            } else if($t->status == 'Admin'){
                return view('home', compact('profile', 'data', 'guru', 'siswa', 'sis'));
            } else {
                return view('home', compact('profile', 'data', 'guru', 'siswa', 'sis'));
            }
        }
    }
}
