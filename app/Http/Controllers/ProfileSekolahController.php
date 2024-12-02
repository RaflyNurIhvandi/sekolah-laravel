<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileSekolahController extends Controller
{
    public function updategambar(Request $request, $no_gambar_profile)
    {
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'gambar/profile_sekolah/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('gambar_profile_daftar_sekolah')->where('no_gambar_profile', $no_gambar_profile)->update([
            'gambar_profile'=>$nama_file
        ]);
        return back();
    }
    public function updatedata(Request $request, $kode_sekolah)
    {
        DB::table('daftar_sekolah')->where('kode_sekolah', $kode_sekolah)->update([
            'nama_sekolah'=>$request->namasekolah,
            'grub'=>$request->tingkatsekolah,
            'npsn'=>$request->npsn,
            'subjek'=>$request->subjeksekolah,
            'deskripsi'=>$request->des,
            'alamat_sekolah'=>$request->alamatsekolah
        ]);
        return back();
    }
}
