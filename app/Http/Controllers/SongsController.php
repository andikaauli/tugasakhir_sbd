<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $songs = DB::select('select * from songs WHERE title_songs LIKE :title_songs OR nama_band LIKE :nama_band', ['title_songs'=> '%' . $request->search . '%' ,'nama_band'=> '%' . $request->search . '%']);
        }else{
            $songs = DB::select('select * from songs');
        }

        return view('songs.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_songs' => 'required',
            'title_songs' => 'required',
            'nama_band' => 'required',
        ]);

        DB::insert('INSERT INTO songs(id_songs, title_songs, nama_band) values (:id_songs, :title_songs, :nama_band)',
            [
                'id_songs' => $request->id_songs,
                'title_songs' => $request ->title_songs,
                'nama_band' => $request ->nama_band,
            ]
            );
        return redirect('/song')->with('success', 'Data Lagu berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('songs')->where('id_songs', $id)->first();

        return view('songs.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_songs' => 'required',
            'title_songs' => 'required',
            'nama_band' => 'required',
        ]);

        DB::update('UPDATE songs SET id_songs = :id_songs, title_songs = :title_songs, nama_band = :nama_band WHERE id_songs = :id',
            [
                'id' => $id,
                'id_songs' => $request->id_songs,
                'title_songs' => $request ->title_songs,
                'nama_band' => $request ->nama_band,
            ]
            );


        return redirect('/song')->with('success', 'Data Lagu berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM songs WHERE id_songs = :id_songs', ['id_songs' => $id]);

        return redirect('/song')->with('success', 'Data Lagu berhasil dihapus');
    }
}
