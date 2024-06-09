<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DataTransaksi implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Mengambil transaksi yang terkait dengan pengguna yang sedang login
        return Transaction::where('user_id', $userId)->get();
    }
}
