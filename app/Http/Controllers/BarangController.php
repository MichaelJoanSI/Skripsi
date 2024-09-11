<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('forms.barang', compact('barang'));
    }

    public function detailBarang()
    {
        $barang = Barang::all();
        return view ('forms.detailbarang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'supplier' => 'required',
            'harga' => 'required',
        ]);

        Barang::create([
            'id' => Auth::id(),
            'kode_barang' => $request->kode_barang,
            'nama' => $request->nama_barang,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'supplier' => $request->supplier,
            'harga' => $request->harga,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data Barang recorded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        $barang->update($request->all());

        return redirect()->route('forms.barang')->with('success', 'Barang updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('forms.barang')->with('success', 'Barang deleted successfully.');
    }
}
