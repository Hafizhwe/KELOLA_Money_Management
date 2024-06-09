<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Budgeting</title>
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
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">


    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    
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
                            <a href="/data-transaksi" class="dropdown-item ">Data Transaksi</a>
                            <a href="/budget" class="dropdown-item active"></i>Budget</a>
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
            </head>
            <style>
                .progress-wrapper {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .progress {
                    width: 60%; /* Sesuaikan dengan lebar yang diinginkan */
                    height: 30px; /* Sesuaikan dengan tinggi yang diinginkan */
                    background-color: #f3f3f3;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    position: relative; /* Diperlukan untuk menempatkan teks di tengah */
                }

                .progress-bar {
                    width: {{ $budgetUsagePercentage }}%; /* Sesuaikan dengan persentase yang diinginkan */
                    height: 100%;
                    background-color: {{ $budgetUsagePercentage > 100 ? 'red' : 'green' }};
                    color: black;
                    text-align: center;
                    line-height: 30px;
                    border-radius: 5px;
                    position: absolute; /* Menempatkan teks persentase di tengah */
                    top: 0;
                    left: 0;
                }
            </style>

    <h1>Budget Management</h1>
    <form action="{{ route('budget.filter') }}" method="GET">
        <label for="month">Select Month:</label>
        <select name="month" id="month">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
            <!-- Add more options for other months -->
        </select>
        <button type="submit">Filter</button>
    </form>
    <h2>Income</h2>
    <p>Total Income: {{ $totalIncome }}</p>

    <h2>Expenses</h2>
    <p>Total Expense: {{ $totalExpense }}</p>

    <h2>Budget Usage</h2>
    <div class="progress-wrapper">
    <div class="progress">
        <div class="progress-bar">{{ $budgetUsagePercentage }}%</div>
    </div>
</div>


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