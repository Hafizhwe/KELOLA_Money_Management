<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Akun</title>
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
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


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
                    <h6 class="mb-0" id="user-fullname"></h6>
                    <span id="user-email"></span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="/dashboard" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <div class="nav-item dropdown">
                    <a href="/transaksi" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Transaksi</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="/data-transaksi" class="dropdown-item">Data Transaksi</a>
                        <a href="/akun" class="dropdown-item active"></i>Source Account</a>
                    </div>
                </div>
                <a href="/statistik" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Statistik</a>
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
                        <span class="d-none d-lg-inline-flex" id="profile-fullname"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="/404" class="dropdown-item">My Profile</a>
                        <a href="/settings" class="dropdown-item">Settings</a>
                        <button class="dropdown-item" onclick="handleLogout()">Log Out</button>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->



            <!-- Manajemen Akun Mulai -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-user fa-3x text-primary"></i>
                <div class="ms-3">
                    <h6 class="mb-2">Profil</h6>
                    <p class="mb-0">Kelola informasi pribadi Anda</p>
                    <a href="/akun/profil">Edit Profil</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-lock fa-3x text-primary"></i>
                <div class="ms-3">
                    <h6 class="mb-2">Keamanan</h6>
                    <p class="mb-0">Ubah kata sandi dan pengaturan keamanan</p>
                    <a href="/akun/keamanan">Pengaturan Keamanan</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-credit-card fa-3x text-primary"></i>
                <div class="ms-3">
                    <h6 class="mb-0">Metode Pembayaran</h6>
                    <p class="mb-2">Kelola opsi pembayaran Anda</p>
                    <a href="/akun/pembayaran">Kelola Pembayaran</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-history fa-3x text-primary"></i>
                <div class="ms-3">
                    <h6 class="mb-0">Histori Transaksi</h6>
                    <p class="mb-2">Lihat catatan transaksi Anda</p>
                    <a href="/akun/transaksi">Lihat Histori</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Manajemen Akun Selesai -->

<!-- Informasi Akun Mulai -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Detail Akun</h6>
                    <a href="/akun/detail">Lihat Detail</a>
                </div>
                <!-- Tambahkan konten relevan untuk detail akun -->
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Langganan</h6>
                    <a href="/akun/langganan">Kelola Langganan</a>
                </div>
                <!-- Tambahkan konten relevan untuk manajemen langganan -->
            </div>
        </div>
    </div>
</div>
<!-- Informasi Akun Selesai -->



          

           
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="/input" class="btn btn-lg btn-primary btn-lg-square back-to-top">
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>