<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id', 'username', 'password')->get();
        return view('user.user-index', [
            "users" => $users
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
            'username' => 'required',
            'password' => 'required|min:4|confirmed'
        ]);

        User::create([
            "username" => $validatedData['username'],
            "password" => bcrypt($validatedData['password'])
        ]);

        return redirect('/user')->with('alert', "Tambah User Berhasil");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'passwordLama' => 'required',
            'password' => 'required|min:4|confirmed'
        ]);

        if (Hash::check($request->passwordLama, $user->password)) {
            User::where('id', $user->id)
                ->update(['password' => bcrypt($request->password)]);
            return back()->with('alert', 'Password Berhasil Diganti');
        } else {
            return redirect('/user')->with('failed', 'Password Lama Salah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy('id', $user->id);
        return redirect('/user')->with('alert', 'Data User Berhasil Dihapus');
    }
}
