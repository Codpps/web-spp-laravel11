<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spp = Spp::all();
        return view('admin.spp.index', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.spp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            'nominal' => 'required|numeric',
        ]);

        Spp::create([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('spp.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $spp = Spp::find($id);
        return view('admin.spp.edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'nullable|numeric',
            'nominal' => 'nullable|numeric',
        ]);

        $spp = Spp::findOrFail($id);

        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();

        return redirect()->route('spp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spp = Spp::findOrFail($id);

        $spp->delete();

        return redirect()->route('spp.index');

    }
}
