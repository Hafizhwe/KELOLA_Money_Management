<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Login</title>
    <!--link c5s-->
    <link rel="stylesheet" href="css/login.css">
    <!--boxs icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!--link font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;" rel="stylesheet">


</head>

<body class="header"> <!-- Tambahkan class "header" pada body -->
    <div class="header">
        <div class="logo">
            <img src="img/Logo Kelola 1.png" alt="Logo Aplikasi">
        </div>
        <div class="signin">
            <a href="/register">
                <button>Register</button>
            </a>
        </div>
    </div>

    <div class="register">
        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Login</h1>

            <div class="input-box">
                <div class="input-field">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <i class='bx bxs-heart' id="togglePassword" class="bx bxs-show"></i>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="bx bxs-lock"></i>
                </div>
            </div>

            @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <button type="submit" class="btn">
                <i class="fa fa-user"></i> Login
            </button>

        </form>
    </div>
    <script src="js/login.js"></script>
</body>

</html>
