<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Foto;
use App\Models\Album;
use DB;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data_foto = Foto::all();
    
        $data_foto = DB::table('foto')->join('albums', 'foto.album_id', '=','albums.id')->select('foto.*', 'albums.name as album_name')->orderBy('created_at', 'asc')->get();

        return view('foto.index', compact('data_foto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::all();

        return view('foto.create', compact('albums'));
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
            'name' => 'required',
            'url'   => 'nullable'
        ]);

        DB::table('foto')->insert([
            'name' => $request->name,
            'url' => $request->url,
            'album_id' => $request->album_id,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),

        ]);

        return redirect()->route('foto.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foto = DB::table('foto')->join('albums', 'foto.album_id', '=','albums.id')
                                    ->select('foto.*', 'albums.name as album_name')
                                    ->where('foto.id', '=', $id)
                                    ->first();
        return view('foto.show', compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foto = DB::table('foto')->join('albums', 'foto.album_id', '=','albums.id')
                                    ->select('foto.*', 'albums.name as album_name')
                                    ->where('foto.id', '=', $id)
                                    ->first();
        $albums = DB::table('albums')->select('*')->get();
        return view('foto.edit', compact('foto','albums'));
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
            'name' => 'required',
            'url'   => 'nullable',
            'album_id' => 'required'
        ]);

        // $foto = Foto::find($id);

        $foto = DB::table('foto')->where('id', '=', $id);

        $foto->update([
            'name' => $request->name,
            'url' => $request->url,
            'album_id' => $request->album_id,
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect()->route('foto.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = Foto::find($id);

        $foto->delete();

        return redirect()->route('foto.index')->with('success', 'Data berhasil diubah.');
    }
}
