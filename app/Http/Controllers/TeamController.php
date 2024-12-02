<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function editteam($kode_team)
    {
        $data = DB::table('team')->where('kode_team', $kode_team)->get();
        return view('admin_web.edit.edit_team', compact('data'));
    }
    public function saveteam(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'gambar_insert/team/';
        $file->move($tujuan_upload, $nama_file);
        $kode = date('YmdHis');
        DB::table('team')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'whatsapp' => $request->wa,
            'instagram' => $request->ig,
            'facebook' => $request->fb,
            'twitter' => $request->tw,
            'kode_team' => $kode,
            'gambar' => $nama_file
        ]);
        return back();
    }
    public function updateteam(Request $request, $kode_team)
    {
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'gambar_insert/team/';
        $file->move($tujuan_upload, $nama_file);
        $kode = date('YmdHis');
        DB::table('team')->where('kode_team', $kode_team)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'whatsapp' => $request->wa,
            'instagram' => $request->ig,
            'facebook' => $request->fb,
            'twitter' => $request->tw,
            'kode_team' => $kode,
            'gambar' => $nama_file
        ]);
        return redirect('/daftar/team');
    }
    public function delete($kode_team)
    {
        DB::table('team')->where('kode_team', $kode_team)->delete();
        return redirect('/daftar/team');
    }
    public function saveicon(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'gambar_insert/icon/';
        $file->move($tujuan_upload, $nama_file);
        $kode = date('YmdHis');
        DB::table('iconsekolah')->insert([
            'tingkatan' => $request->tingkatan,
            'gambar' => $nama_file
        ]);
        return back();
    }
    public function editicon($id)
    {
        $edit = DB::table('iconsekolah')->where('id', $id)->get();
        return view('admin_web.edit.edit_icon', compact('edit'));
    }
    public function updateicon(Request $request, $id)
    {
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'gambar_insert/icon/';
        $file->move($tujuan_upload, $nama_file);
        $kode = date('YmdHis');
        DB::table('iconsekolah')->where('id', $id)->update([
            'tingkatan' => $request->tingkatan,
            'gambar' => $nama_file
        ]);
        return redirect('/icon/sekolah');
    }
    public function deleteicon($id)
    {
        DB::table('iconsekolah')->where('id', $id)->delete();
        return redirect('/icon/sekolah');
    }
}
