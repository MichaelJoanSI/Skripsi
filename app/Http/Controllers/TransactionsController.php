<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transactions::where('user_id', Auth::id())->get();
        return view('forms.penjualan', compact('transactions'));
    }

    public function detail()
    {
        $transactions = Transactions::all();
        return view ('forms.detailpenjualan', compact('transactions'));
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_transaction' => 'required',
            'jenis' => 'required',
            'status' => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required',
            'quantity' => 'required',
            'sub_total' => 'required',
        ]);
        
        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());
        
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function delete($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }

    // public function create()
    // {
    //     return view('transactions.create');
    // }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nama_transaction' => 'required',
            'jenis' => 'required',
            'status' => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
            'sub_total' => 'required|numeric|min:1',
        ]);

        Transactions::create([
            'user_id' => Auth::id(),
            'nama_transaction' => $request->nama_transaction,
            'jenis' => $request->jenis,
            'status' => $request->status,
            'satuan' => $request->satuan,
            'harga_jual' => $request->harga_jual,
            'quantity' => $request->quantity,
            'sub_total' => $request->sub_total,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction recorded successfully');
    }
}
