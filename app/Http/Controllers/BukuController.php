<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::select('id', 'nama')->get();
        $bukus = DB::table('bukus')
            ->join('authors', 'bukus.author_id', '=', 'authors.id')
            ->select('bukus.*', 'authors.nama')
            ->get();

        return view('buku.buku-index', [
            "bukus" => $bukus,
            "authors" => $authors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'terjual' => 'required',
            'author_id' => 'required'
        ]);

        Buku::create($validatedData);
        return redirect('/buku')->with('alert', 'Data Buku Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'terjual' => 'required',
            'author_id' => 'required'
        ]);

        Buku::where('id', $buku->id)->update($validatedData);
        return redirect('/buku')->with('alert', "Data Author Berhasil Diganti");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        Buku::destroy('id', $buku->id);
        return redirect('/buku')->with('alert', 'Data Buku Berhasil Dihapus');
    }
}
