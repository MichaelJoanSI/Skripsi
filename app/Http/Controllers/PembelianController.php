<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::where('user_id', Auth::id())->get();
        return view('forms.pembelian', compact('pembelian'));
    }

    public function detail()
    {
        $pembelian = Pembelian::all();
        return view ('forms.detailpembelian', compact('pembelian'));
    }

    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('pembelian.edit', compact('pembelian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_pembelian' => 'required',
            'nama_barang' => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
            'satuan' => 'required',
            'harga_beli' => 'required',
            'sub_total' => 'required',
        ]);
        
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->update($request->all());
        
        return redirect()->route('pembelian.index')->with('success', 'Pembelian updated successfully.');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'kode_pembelian' => 'required',
            'nama_barang' => 'required',
            'tgl_masuk' => 'nullable|date', 
            'tgl_keluar' => 'nullable|date',
            'satuan' => 'required',
            'harga_beli' => 'required|numeric|min:1',
            'sub_total' => 'required|numeric|min:1',
        ]);

        Pembelian::create([
            'user_id' => Auth::id(),
            'kode_pembelian' => $request->kode_pembelian,
            'nama_barang' => $request->nama_barang,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
            'satuan' => $request->satuan,
            'harga_beli' => $request->harga_beli,
            'sub_total' => $request->sub_total,
        ]);

        return redirect()->route('pembelian.index')->with('success', 'Transaction recorded successfully');
    }

    public function delete($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();
        
        return redirect()->route('pembelian.index')->with('success', 'Pembelian deleted successfully.');
    }
}
