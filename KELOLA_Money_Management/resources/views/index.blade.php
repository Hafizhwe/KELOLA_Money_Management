<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
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
        <!-- Spinner Start
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        Spinner End -->


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
                    <a href="/dashboard" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="/transaksi" class="nav-link dropdown-toggle " data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Transaksi</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/data-transaksi" class="dropdown-item ">Data Transaksi</a>
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

<!-- Income and Expenses Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- Income Box -->
        <div class="col-sm-10 col-xl-4">
            <div class="bg-secondary text-center rounded p-4">
                <h6 class="mb-0">Income Today</h6>

                <!-- Income Details -->
                <div class="mt-4 text-start">
                    <ul>
                        @foreach($incomeToday as $transaction)
                        <li>
                            <strong>Date:</strong> {{ $transaction->date }}<br>
                            <strong>Amount:</strong> {{ $transaction->amount }}<br>
                            <strong>Source Bank:</strong> {{ $transaction->source_bank }}<br>
                            <strong>Notes:</strong> {{ $transaction->notes }}

                            <a href="{{ route('delete', ['id' => $transaction->id]) }}" class="btn btn-danger">Delete</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Expenses Box -->
        <div class="col-sm-10 col-xl-4">
            <div class="bg-secondary text-center rounded p-4">
                <h6 class="mb-0">Expenses Today</h6>

                <!-- Expenses Details -->
                <div class="mt-4 text-start">
                    <ul>
                        @foreach($expenseToday as $transaction)
                        <li>
                            <strong>Date:</strong> {{ $transaction->date }}<br>
                            <strong>Amount:</strong> {{ $transaction->amount }}<br>
                            <strong>Source Bank:</strong> {{ $transaction->source_bank }}<br>
                            <strong>Notes:</strong> {{ $transaction->notes }}

                            <a href="{{ route('delete', ['id' => $transaction->id]) }}" class="btn btn-danger">Delete</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bills Box -->
        <div class="col-sm-10 col-xl-4">
            <div class="bg-secondary text-center rounded p-4">
                <h6 class="mb-0">Tagihan</h6>

                <!-- Bills Details -->
                <div class="mt-4 text-start">
                    <ul>
                        @foreach($tagihan as $transaction)
                        <li>
                            <strong>Date:</strong> {{ $transaction->date }}<br>
                            <strong>Amount: -</strong> {{ $transaction->amount }}<br>
                            <strong>Source Bank:</strong> {{ $transaction->source_bank }}<br>
                            <strong>Notes:</strong> {{ $transaction->notes }}

                            <a href="{{ route('delete', ['id' => $transaction->id]) }}" class="btn btn-danger">Delete</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Edit Transaction Modal -->
<div class="modal fade" id="editTransactionModal" tabindex="-1" aria-labelledby="editTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTransactionModalLabel">Edit Transaction Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editTransactionForm">
                    <!-- Add form fields here -->
                    <input type="hidden" id="editTransactionId" name="editTransactionId">
                    <div class="mb-3">
                        <label for="editTransactionDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="editTransactionDate" name="editTransactionDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTransactionAmount" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="editTransactionAmount" name="editTransactionAmount" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTransactionSource" class="form-label">Source Bank</label>
                        <input type="text" class="form-control" id="editTransactionSource" name="editTransactionSource" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTransactionNote" class="form-label">Note</label>
                        <textarea class="form-control" id="editTransactionNote" name="editTransactionNote" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Income and Expenses End -->



        <!-- Back to Top -->
        <a href="/create" class="btn btn-lg btn-primary btn-lg-square back-to-top">
            <i class="bi bi-plus"></i> <!-- Ganti dengan kelas atau ikon plus yang sesuai -->
        </a>
        
        <!-- Tambahkan Bootstrap JS dan Popper.js jika belum ada -->
        
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
    <script src="js/get_income.js"></script>
    <script src="js/get_expense.js"></script>
    <script src="js/update_transaction.js"></script>
</body>

</html>