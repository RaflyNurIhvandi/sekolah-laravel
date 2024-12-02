<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoterController extends Controller
{
    public function editfoter($id)
    {
        $data = DB::table('fotersekolah')->where('id', $id)->get();
        return view('admin_web.edit.edit_foter', compact('data'));
    }
    public function updatefoter(Request $request, $id)
    {
        DB::table('fotersekolah')->where('id', $id)->update([
            'deskripsi' => $request->deskripsi,
            'des' => $request->des,
            'contact' => $request->contact,
            'email' => $request->email,
            'text' => $request->text
        ]);
        return redirect('/foter/sekolah');
    }
    public function editfoter1($id)
    {
        $edit = DB::table('foter1')->where('id', $id)->get();
        return view('admin_web.edit.edit_des', compact('edit'));
    }
    public function updatefoter1(Request $request, $id)
    {
        DB::table('foter1')->where('id', $id)->update([
            'icon' => $request->icon,
            'link' => $request->link,
        ]);
        return redirect('/foter/sekolah');
    }
}
