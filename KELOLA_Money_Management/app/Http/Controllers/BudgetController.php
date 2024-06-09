<?php

// app/Http/Controllers/BudgetController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Inisialisasi variabel untuk menyimpan data bulan yang dipilih dan bulan default
        $selectedMonth = '';
        $selectedMonthNumber = $request->input('month', date('m')); // Mengambil bulan dari input form, default ke bulan saat ini jika tidak ada input

        // Menghitung total pendapatan berdasarkan bulan yang dipilih dan terkait dengan pengguna yang sedang login
        $totalIncome = Transaction::where('type', 'income')
            ->where('user_id', $userId)
            ->whereMonth('date', $selectedMonthNumber)
            ->sum('amount');

        // Menghitung total pengeluaran berdasarkan bulan yang dipilih dan terkait dengan pengguna yang sedang login
        $totalExpense = Transaction::where('type', 'expense')
            ->where('user_id', $userId)
            ->whereMonth('date', $selectedMonthNumber)
            ->sum('amount');

        // Menghitung persentase penggunaan budget berdasarkan bulan yang dipilih
        $budgetUsagePercentage = $totalIncome != 0 ? ($totalExpense / $totalIncome) * 100 : 0;
        $budgetUsagePercentage = number_format($budgetUsagePercentage, 2); // Memformat angka dengan dua digit di belakang koma


        // Konversi angka bulan menjadi nama bulan
        $selectedMonth = date("F", mktime(0, 0, 0, $selectedMonthNumber, 1));

        return view('budget', compact('totalIncome', 'totalExpense', 'budgetUsagePercentage', 'selectedMonth'));
    }
}