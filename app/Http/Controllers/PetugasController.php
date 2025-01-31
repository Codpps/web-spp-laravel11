<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::all();
        return view('admin.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
       $request->validate([
    'user_id' => 'required',
    'siswa_id' => 'required',
    'spp_id' => 'required',
    'jumlah_bayar' => 'required|numeric|max:' . $request->input('spp_nominal'),
]);

Pembayaran::create([
    'user_id' => $request->user_id,
    'siswa_id' => $request->siswa_id,
    'spp_id' => $request->spp_id,
    'jumlah_bayar' => intval($request->jumlah_bayar),
]);


        return redirect()->route('petugas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = User::findOrFail($id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'name' => 'required|min:4',
            'email' => 'required',
            'password' => 'nullable',
            'role' => 'required'
        ]);

        $petugas = User::findOrFail($id);

        $petugas->name = $request->name;
        $petugas->email = $request->email;
        $petugas->role = $request->role;

        if($request->filled('password')){
            $petugas->password = Hash::make($request->password);
        }

        $petugas->save();

        return redirect()->route('petugas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas.index');
    }
}
