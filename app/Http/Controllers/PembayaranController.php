<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        $petugas = User::all();
        $spp = Spp::all();
        $pembayaran = Pembayaran::all();

        return view('admin.pembayaran.index', compact('siswa', 'spp', 'petugas', 'pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $petugas = User::all();
        $spp = Spp::all();
        return view('admin.pembayaran.create', compact('siswa', 'spp', 'petugas'));
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
        'jumlah_bayar' => 'required|numeric',
    ]);

    Pembayaran::create([
        'user_id' => $request->user_id,
        'siswa_id' => $request->siswa_id,
        'spp_id' => $request->spp_id,
        'jumlah_bayar' => $request->jumlah_bayar, // Ensure it's included here
    ]);

    return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $pembayaran = Pembayaran::findOrFail($id);

    // Cek apakah sudah lunas
    if ($pembayaran->jumlah_bayar >= $pembayaran->spp->nominal) {
        return redirect()->route('pembayaran.index')->with('info', 'Pembayaran sudah lunas.');
    }

    return view('admin.pembayaran.edit', compact('pembayaran'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'jumlah_bayar' => 'required|numeric|min:1',
    ]);

    $pembayaran = Pembayaran::findOrFail($id);
    $total_bayar = $pembayaran->jumlah_bayar + $request->jumlah_bayar;

    // Pastikan total bayar tidak melebihi nominal SPP
    if ($total_bayar > $pembayaran->spp->nominal) {
        return redirect()->back()->with('error', 'Jumlah bayar tidak boleh melebihi nominal SPP.');
    }

    // Update jumlah bayar
    $pembayaran->update(['jumlah_bayar' => $total_bayar]);

    return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
    return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');

    }
}
