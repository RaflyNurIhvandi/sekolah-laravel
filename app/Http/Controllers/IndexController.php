<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $data = DB::table('team')->get();
        $edit = DB::table('iconsekolah')->get();
        $foter = DB::table('fotersekolah')->get();
        $fb = DB::table('foter1')->where('icon', 'Facebook')->get();
        $tw = DB::table('foter1')->where('icon', 'Twiter')->get();
        $ig = DB::table('foter1')->where('icon', 'Instagram')->get();
        $wa = DB::table('foter1')->where('icon', 'Whatsapp')->get();
        return view('index', compact('data', 'edit', 'foter', 'fb', 'tw', 'ig', 'wa'));
    }
}
