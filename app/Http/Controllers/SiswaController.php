<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.siswa.create', compact('kelas', 'spp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required|min:4',
            'nis' => 'required|min:5',
            'nisn' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'spp_id' => 'required',
        ]);

        Siswa::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'spp_id' => $request->spp_id,
        ]);
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.siswa.edit', compact('siswa', 'kelas', 'spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:4',
            'nis' => 'required|min:5',
            'nisn' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'spp_id' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->spp_id = $request->spp_id;
        $siswa->save();

        return redirect()->route('siswa.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index');
    }
}
