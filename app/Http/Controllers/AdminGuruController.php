<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminGuruController extends Controller
{
    public function kirimresign(Request $request, $no_status)
    {
        $stsresign = "RESIGN";
        DB::table('status_guru')->where('no_status', $no_status)->update([
            'status_guru'=>$stsresign,
            'alasan'=>$request->alasan
        ]);
        return back();
    }
    public function out(Request $request, $no_status)
    {
        $noang = $request->noanggota;
        $sts = "DIBATALKAN";
        DB::table('status_guru')->where('no_status', $no_status)->update([
            'status_guru'=>$sts,
            'alasan'=>$request->alasan
        ]);
        DB::table('profile_guru')->where('no_anggota', $noang)->delete();
        DB::table('pas_foto_guru')->where('no_anggota', $noang)->delete();
        DB::table('entertiment_guru')->where('no_anggota', $noang)->delete();
        DB::table('cv_guru')->where('no_anggota', $noang)->delete();
        return redirect('/home');
    }
    public function bukacv($no_anggota)
    {
        $data = DB::table('cv_guru')->where('no_anggota', $no_anggota)->get();
        return view('admin_guru.cv_guru.index', compact('data'));
    }
    public function masukadminguru()
    {
        $ur = Auth::user()->name;
        $profile = DB::table('profile_guru')
                ->join('pas_foto_guru', 'profile_guru.no_anggota', '=', 'pas_foto_guru.no_anggota')
                ->join('entertiment_guru', 'profile_guru.no_anggota', '=', 'entertiment_guru.no_anggota')
                ->join('cv_guru', 'profile_guru.no_anggota', '=', 'cv_guru.no_anggota')
                ->where('user', $ur)
                ->get();
        $stt = DB::table('profile_guru')
                ->join('status_guru', 'profile_guru.no_anggota', '=', 'status_guru.no_anggota')
                ->where('profile_guru.user', $ur)
                ->where('status_guru', 'BELUM DITERIMA')
                ->get();
        $rsg = DB::table('profile_guru')
                ->join('status_guru', 'profile_guru.no_anggota', '=', 'status_guru.no_anggota')
                ->where('profile_guru.user', $ur)
                ->where('status_guru', 'DITERIMA')
                ->get();
        foreach($profile as $p){
            if ($p->status == 'BELUM DITERIMA') {
                return view('admin_guru.belum_diterima', compact('profile', 'stt', 'rsg'));
            } else {
                return view('admin_guru.index', compact('profile', 'stt', 'rsg'));
            }
        }
    }
    public function daftarkanguru(Request $request)
    {
        $nosts = "ST".date("YmdHis");
        $usr = Auth::user()->name;
        $status = 'BELUM DITERIMA';
        DB::table('profile_guru')->insert([
            'no_anggota'=>$request->noanggota,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'tempat_lahir'=>$request->tempatlahir,
            'tanggal_lahir'=>$request->tgl,
            'no_hp'=>$request->nohp,
            'email'=>$request->email,
            'umur'=>$request->umur,
            'genre'=>$request->genre,
            'keahlian'=>$request->keahlian,
            'deskripsi'=>$request->des,
            'user'=>$usr,
            'nama_sekolah'=>$request->namasekolah,
            'npsn'=>$request->npsn,
            'status'=>$status
        ]);
        $this->validate($request, [
            'cv' => 'required|mimes:pdf,zip'
        ]);
        $file = $request->file('cv');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'cv/cv_guru/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('cv_guru')->insert([
            'no_anggota'=>$request->noanggota,
            'file'=>$nama_file
        ]);
        DB::table('entertiment_guru')->insert([
            'no_anggota'=>$request->noanggota,
            'whatsapp'=>$request->wa,
            'instagram'=>$request->ig,
            'facebook'=>$request->fb,
            'twitter'=>$request->tw,
            'tiktok'=>$request->tt,
            'youtube'=>$request->yt
        ]);
        $this->validate($request, [
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $fl = $request->file('foto');
        $nm_file = time()."_".$fl->getClientOriginalName();
        $tujuan_up = 'gambar/pas_foto_guru/';
        $fl->move($tujuan_up, $nm_file);
        DB::table('pas_foto_guru')->insert([
            'no_anggota'=>$request->noanggota,
            'gambar'=>$nm_file
        ]);
        DB::table('status_guru')->insert([
            'no_status'=>$nosts,
            'no_anggota'=>$request->noanggota,
            'status_guru'=>$status,
            'user'=>$usr
        ]);
        return redirect('/home');
    }
    public function daftarguruadmin()
    {
        return view('daftarkan_guru');
    }
}
