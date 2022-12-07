<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = DB::select('select * from members');

        return view('members.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
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
            'id_personil' => 'required',
            'id_band',
            'nama_personil' => 'required',
            'tanggal_lahir',
        ]);

        DB::insert('INSERT INTO members(id_personil, id_band, nama_personil, tanggal_lahir) values (:id_personil, :id_band, :nama_personil, :tanggal_lahir)',
            [
                'id_personil' => $request->id_personil,
                'id_band' => $request ->id_band,
                'nama_personil' => $request ->nama_personil,
                'tanggal_lahir' => $request ->tanggal_lahir,
            ]
            );
        return redirect('/member')->with('success', 'Data Personil berhasil disimpan');
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
        $data = DB::table('members')->where('id_personil', $id)->first();

        return view('members.edit')->with('data', $data);
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
            'id_personil' => 'required',
            'id_band',
            'nama_personil' => 'required',
            'tanggal_lahir',
        ]);

        DB::update('UPDATE members SET id_personil = :id_personil, id_band = :id_band, nama_personil = :nama_personil, tanggal_lahir = :tanggal_lahir WHERE id_personil = :id',
            [
                'id' => $id,
                'id_personil' => $request->id_personil,
                'id_band' => $request ->id_band,
                'nama_personil' => $request ->nama_personil,
                'tanggal_lahir' => $request ->tanggal_lahir,
            ]
            );


        return redirect('/member')->with('success', 'Data Personil berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            DB::delete('DELETE FROM members WHERE id_personil = :id_personil', ['id_personil' => $id]);

            return redirect('/member')->with('success', 'Data Personil berhasil dihapus');
        }
    }
}
