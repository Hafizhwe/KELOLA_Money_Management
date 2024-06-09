<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'type' => 'required|in:income,expense,tagihan',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'source_bank' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        // Tambahkan user_id ke data yang akan disimpan
        $validatedData['user_id'] = Auth::id();

        // Buat transaksi baru
        Transaction::create($validatedData);

        return redirect()->route('transactions.create')->with('success', 'Transaksi berhasil disimpan.');
    }
}
