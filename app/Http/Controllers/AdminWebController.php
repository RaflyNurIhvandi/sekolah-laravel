<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminWebController extends Controller
{
    public function adminweb()
    {
        return view('admin_web.index');
    }
    public function daftarteam()
    {
        $team = DB::table('team')->get();
        return view('admin_web.team.daftar_team', compact('team'));
    }
    public function iconsekolah()
    {
        $icon = DB::table('iconsekolah')->get();
        return view('admin_web.team.icon_sekolah', compact('icon'));
    }
    public function fotersekolah()
    {
        $foter = DB::table('fotersekolah')->get();
        $edit = DB::table('foter1')->get();
        return view('admin_web.foter.fotersekolah', compact('foter', 'edit'));
    }
}
