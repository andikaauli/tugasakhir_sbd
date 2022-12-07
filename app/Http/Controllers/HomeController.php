<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
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
        $musics = DB::select('SELECT S.title_songs, B.nama_band, A.nama_album, A.tahun_terbit
        FROM songs S
        INNER JOIN albums A
        on S.id_albums = a.id_albums
        inner JOIN bands B
        on S.id_bands = b.id_band' );
        return view('musics.index', ['musics' => $musics]);
    }
}
