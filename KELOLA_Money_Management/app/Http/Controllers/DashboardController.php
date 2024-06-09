<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Mengambil data transaksi expense dan income yang terjadi hari ini dan terkait dengan pengguna yang sedang login
        $today = date('Y-m-d');
        $expenseToday = Transaction::where('type', 'expense')->where('user_id', $userId)->whereDate('date', $today)->get();
        $incomeToday = Transaction::where('type', 'income')->where('user_id', $userId)->whereDate('date', $today)->get();

        // Mengambil semua data transaksi tagihan yang terkait dengan pengguna yang sedang login
        $tagihan = Transaction::where('type', 'tagihan')->where('user_id', $userId)->get();

        // Mengirimkan data ke view
        return view('index', compact('expenseToday', 'incomeToday', 'tagihan'));
    }

    public function delete($id){
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Cari transaksi berdasarkan id dan ID pengguna yang sedang login
        $data = Transaction::where('user_id', $userId)->find($id);
    
        // Periksa apakah transaksi ditemukan
        if($data){
            // Jika transaksi ditemukan, hapus transaksi
            $data->delete(); 
            return redirect()->route('dashboard')->with('Success', 'Data Berhasil Di Hapus');
        } else {
            // Jika transaksi tidak ditemukan, kembalikan pesan kesalahan
            return redirect()->route('dashboard')->with('Error', 'Transaksi tidak ditemukan');
        }
    }
}
