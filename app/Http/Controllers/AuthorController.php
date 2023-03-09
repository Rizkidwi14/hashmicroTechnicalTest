<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('author.author-index', [
            "authors" => $authors
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
    public function store(StoreAuthorRequest $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required',
            'ulang_tahun' => 'required',
            'networth' => 'required'
        ]);

        Author::create($validatedData);
        return redirect('/author')->with('alert', 'Data Author Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'ulang_tahun' => 'required',
            'networth' => 'required'
        ]);

        Author::where('id', $author->id)->update($validatedData);
        return redirect('/author')->with('alert', "Data Author Berhasil Diganti");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        Author::destroy('id', $author->id);
        return redirect('/author')->with('alert', 'Data Author Berhasil Dihapus!');
    }
}
