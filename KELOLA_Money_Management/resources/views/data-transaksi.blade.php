<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Transaksi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-white">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <img src="img/Logo Kelola 1.png" alt="Logo" class="img-fluid me-2"></h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->username }}</h6>
                        <span>{{ Auth::user()->email }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/dashboard" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="/transaksi" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Transaksi</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/data-transaksi" class="dropdown-item active">Data Transaksi</a>
                            <a href="/budget" class="dropdown-item"></i>Budget</a>
                        </div>
                    </div>
                    <a href="/settings" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Settings</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <img src="img/Logo Kelola 1.png" alt="Logo" class="img-fluid me-2"></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <div class="navbar-nav align-items-center ms-auto">
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex" id="profile-fullname">{{ Auth::user()->username }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="/settings" class="dropdown-item">Settings</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Month Selector Section -->
            <div class="container-fluid mx-auto pt-4 px-4">
                <form action="{{ route('filter') }}" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label> Start Date: </label>
                            <input type="date" name="start_date" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label> End Date: </label>
                            <input type="date" name="end_date" class="form-control">
                        </div>

                        <div class="col-md-1 pt-4">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="container-fluid mx-auto pt-4 px-4">
                <!-- Transaction Statement Section -->
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="transaction-statement bg-secondary rounded p-4">
                        <h6 class="mb-4">Statement Transaksi</h6>
                        <table class="table table-striped transaction-statement-table">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Source Bank</th>
                                    <th>Notes</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody class="transaction-statement-body">
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->type }}</td>
                                        <td>{{ $transaction->date }}</td>
                                        <td>{{ $transaction->source_bank }}</td>
                                        <td>{{ $transaction->notes }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                    </tr>
                                @endforeach
                                <!-- Data transaksi lainnya -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right">Total Pemasukan: {{ $summary['totalPemasukan'] }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Total Pengeluaran: {{ $summary['totalPengeluaran'] }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Saldo Tersisa: {{ $summary['saldoTersisa'] }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            
            
            

        <!-- Export Button Section -->
        <div class="export-button-section mt-4">
            <button id="exportBtn">
                <img src="{{ asset('img/excell.png') }}" alt="Excel Logo" class="excel-logo"> Export Statement
            </button>
        </div>

        <script>
            // Tambahkan event listener untuk tombol eksport
            document.getElementById('exportBtn').addEventListener('click', function() {
                // Kirim permintaan GET ke URL rute 'export-excel' menggunakan Laravel's route()
                window.location.href = "{{ route('exportExcel') }}";
            });
        </script>


        <!-- Back to Top -->
        <a href="/create " class="btn btn-lg btn-primary btn-lg-square back-to-top">
            <i class="bi bi-plus"></i> <!-- Ganti dengan kelas atau ikon plus yang sesuai -->
        </a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>