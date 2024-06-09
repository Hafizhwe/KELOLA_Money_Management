<?php

use App\Http\Controllers\DataTransaksiController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BudgetController;

Route::get('/404', function () {
    return view('404');
});

Route::get('/akun', function () {
    return view('akun');
});

Route::get('/data-transaksi', [DataTransaksiController::class, 'index'])->name('data-transaksi');

Route::get('/dashboard', function () {
    return view('index');
});




Route::get('/statistik', function () {
    return view('statistik');
});

Route::get('/transaksi', function () {
    return view('transaksi');
});

// Route::get('/logintst', function () {
//     return view('logintst');
// });

// Route::get('/registertst', function () {
//     return view('registertst');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::post('/preview-transaksi', 'TransaksiController@previewTransactions')->name('preview.transaksi');
 
Route::post('/register', [RegisterController::class, 'store']);

Route::get('create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('store', [TransactionController::class, 'store'])->name('transactions.store');


Route::get('/filter', [DataTransaksiController::class, 'filter'])->name('filter');

Route::get('/data-transaksi', [DataTransaksiController::class, 'index'])->name('data-transaksi');


Route::get('/user-data', 'UserController@getUserData');


Route::get('/settings', 'App\Http\Controllers\SettingsController@index')->name('settings');
Route::post('/update-account', 'App\Http\Controllers\SettingsController@update')->name('update-account');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/exportExcel', [DataTransaksiController::class, 'export_Excel'])->name('exportExcel');

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/delete/{id}',[DashboardController::class, 'delete'])->name('delete');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/budget', [BudgetController::class, 'index']);
Route::get('/budget/filter', [BudgetController::class, 'index'])->name('budget.filter');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
