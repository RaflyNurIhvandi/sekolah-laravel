<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FasilitasController extends Controller
{
    //fasilitas umum

    public function delgmfas($no_gambar)
    {
        DB::table('gambar_fasilitas')->where('no_gambar', $no_gambar)->delete();
        return back();
    }
    public function delgm($no_gambar)
    {
        DB::table('gambar_fasilitas')->where('no_gambar', $no_gambar)->delete();
        return back();
    }
    public function editumum($no_fasilitas)
    {
        $user = Auth::user()->name;
        $edit = DB::table('daftar_sekolah')
            ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
            ->where('user', $user)
            ->get();
        $umum = DB::table('fasilitas_umum')->where('no_fasilitas', $no_fasilitas)->get();
        return view('admin_sekolah.edit_fasilitas.fasilitas_umum', compact('umum', 'edit'));
    }

    public function fasilitas(Request $request)
    {
        $no = "FU" . date("YmdHis");
        DB::table('fasilitas_umum')->insert([
            'nama_fasilitas' => $request->nama_fasilitas,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'npsn' => $request->npsn,
            'no_fasilitas' => $no
        ]);

        return back();
    }

    public function updfsumum(Request $request, $no_fasilitas)
    {
        DB::table('fasilitas_umum')->where('no_fasilitas', $no_fasilitas)->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/admin/fasilitas');
    }

    public function delete($no_fasilitas)
    {
        DB::table('fasilitas_umum')->where('no_fasilitas', $no_fasilitas)->delete();
        DB::table('gambar_fasilitas')->where('no_fasilitas', $no_fasilitas)->delete();
        return back();
    }

    //gambar fasilitas umum

    public function tamgambar($no_fasilitas)
    {
        $user = Auth::user()->name;
        $edit = DB::table('daftar_sekolah')
            ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
            ->where('user', $user)
            ->get();
        $editgm = DB::table('fasilitas_umum')
            ->join('profile_admin', 'fasilitas_umum.npsn', '=', 'profile_admin.npsn')
            ->join('gambar_fasilitas', 'fasilitas_umum.no_fasilitas', '=', 'gambar_fasilitas.no_fasilitas')
            ->where('user', $user)
            ->where('fasilitas_umum.no_fasilitas', $no_fasilitas)
            ->get();
        $addgm = DB::table('fasilitas_umum')->where('no_fasilitas', $no_fasilitas)->get();
        $data = DB::table('gambar_fasilitas')->where('no_fasilitas', $no_fasilitas)->get();
        return view('admin_sekolah.tambah.tambah_gambar', compact('data', 'edit', 'editgm', 'addgm'));
    }

    public function umum(Request $request, $no_gambar)
    {
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'gambar/fasilitas/umum/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('gambar_fasilitas')->where('no_gambar', $no_gambar)->update([
            'gambar' => $nama_file
        ]);
        return back();
    }

    public function svgmumu(Request $request)
    {
        // return $request;
        $no = "GFU" . date("YmdHis");
        $grub = 'UMUM';
        $this->validate($request, [
            'gmbr' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('gmbr');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'gambar/fasilitas/umum/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('gambar_fasilitas')->insert([
            'gambar' => $nama_file,
            'no_fasilitas' => $request->no_fasilitas,
            'no_gambar' => $no,
            'grub'=> $grub
        ]);
        return back();
    }

    //fasilitas tambahan

    public function fastambahan(Request $request)
    {
        $dt = "FT" . date("YmdHis");
        DB::table('fasilitas_tambahan')->insert([
            'nama_fasilitas' => $request->nama_fasilitas,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'npsn' => $request->npsn,
            'no_fasilitas' => $dt
        ]);
        return back();
    }

    public function edittambah($no_fasilitas)
    {
        $user = Auth::user()->name;
        $edit = DB::table('daftar_sekolah')
            ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
            ->where('user', $user)
            ->get();
        $tambahan = DB::table('fasilitas_tambahan')->where('no_fasilitas', $no_fasilitas)->get();
        return view('admin_sekolah.edit_fasilitas.fasilitas_tambahan', compact('tambahan', 'edit'));
    }

    public function updftambahan(Request $request, $no_fasilitas)
    {
        DB::table('fasilitas_tambahan')->where('no_fasilitas', $no_fasilitas)->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/admin/fasilitas');
    }

    public function deletetambah($no_fasilitas)
    {
        DB::table('fasilitas_tambahan')->where('no_fasilitas', $no_fasilitas)->delete();
        DB::table('gambar_fasilitas')->where('no_fasilitas', $no_fasilitas)->delete();
        return back();
    }

    //gambar fasilitas tambahan
    function tamtambahan($no_fasilitas)
    {
        $user = Auth::user()->name;
        $edit = DB::table('daftar_sekolah')
            ->join('profile_admin', 'daftar_sekolah.npsn', '=', 'profile_admin.npsn')
            ->where('user', $user)
            ->get();
        $editgmt = DB::table('fasilitas_tambahan')
            ->join('profile_admin', 'fasilitas_tambahan.npsn', '=', 'profile_admin.npsn')
            ->join('gambar_fasilitas', 'fasilitas_tambahan.no_fasilitas', '=', 'gambar_fasilitas.no_fasilitas')
            ->where('user', $user)
            ->where('fasilitas_tambahan.no_fasilitas', $no_fasilitas)
            ->get();
        $addgmt = DB::table('fasilitas_tambahan')->where('no_fasilitas', $no_fasilitas)->get();
        $data = DB::table('gambar_fasilitas')->where('no_fasilitas', $no_fasilitas)->get();
        return view('admin_sekolah.tambah.tambah_gambar_tambahan', compact('edit','editgmt','addgmt','data'));
    }
    public function tambahan(Request $request, $no_gambar)
    {
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'gambar/fasilitas/tambahan/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('gambar_fasilitas')->where('no_gambar', $no_gambar)->update([
            'gambar' => $nama_file
        ]);
        return back();
    }

    public function svtambah(Request $request)
    {
        // return $request;
        $no = "GFT" . date("YmdHis");
        $grub = 'TAMBAHAN';
        $this->validate($request, [
            'gmbr' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('gmbr');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'gambar/fasilitas/tambahan/';
        $file->move($tujuan_upload, $nama_file);
        DB::table('gambar_fasilitas')->insert([
            'gambar' => $nama_file,
            'no_fasilitas' => $request->no_fasilitas,
            'no_gambar' => $no,
            'grub'=> $grub
        ]);
        return back();
    }
}
//
