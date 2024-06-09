use App\Models\Transaction;
use Illuminate\Http\Request;

public function previewTransactions(Request $request)
{
    $bulan = $request->bulan;
    $tahun = $request->tahun;

    // Ambil data transaksi dari database sesuai dengan bulan dan tahun yang dipilih
    $transactions = Transaction::whereMonth('tanggal', $bulan)
                                ->whereYear('tanggal', $tahun)
                                ->get();

    // Tampilkan kembali halaman data-transaksi.blade.php dengan data transaksi yang telah dipilih
    return view('data-transaksi', ['transactions' => $transactions]);
}
