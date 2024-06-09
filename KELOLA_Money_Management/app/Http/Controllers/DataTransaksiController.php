<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Exports\DataTransaksi;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class DataTransaksiController extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Memuat transaksi yang terkait dengan pengguna yang sedang login
        $transactions = Transaction::where('user_id', $userId)->get();

        // Menghitung summary
        $summary = $this->getSummary($transactions);

        // Mendapatkan informasi pengguna yang login dari sesi
        $user_username = session('user_username');
        $user_email = session('user_email');

        return view('data-transaksi', compact('transactions', 'summary', 'user_username', 'user_email'));
    }

    private function getSummary($transactions)
    {
        $totalPemasukan = $transactions->where('type', 'income')->sum('amount');
        $totalPengeluaran = $transactions->where('type', 'expense')->sum('amount');
        $saldoTersisa = $totalPemasukan - $totalPengeluaran;
        
        return [
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'saldoTersisa' => $saldoTersisa,
        ];
    }

    public function filter(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $userId = Auth::id();

        // Ambil data transaksi berdasarkan rentang tanggal
        $transactions = Transaction::where('user_id', $userId)
                                ->whereBetween('date', [$startDate, $endDate])
                                ->get();

        // Hitung summary
        $summary = $this->getSummary($transactions);

        return view('data-transaksi', compact('transactions', 'summary'));
    }

    public function export_Excel()
    {
        return Excel::download(new DataTransaksi, 'datatransaksi.xlsx'); // Perbarui penggunaan kelas Excel
    }
}
