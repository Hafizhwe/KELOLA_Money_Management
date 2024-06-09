<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Register</title>
    <!--link c5s-->
    <link rel="stylesheet" href="css/register.css" />
    <!--boxs icons-->
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />
    <!--link font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;"
      rel="stylesheet"
    /> -->
  </head>

  <body>
    
    
    <div class="header">
      <div class="logo">
        <img src="img/Logo Kelola 1.png" alt="Logo Aplikasi" />
      </div>
      <div class="signin">
        <a href="/login">
          <button>Sign in</button>
        </a>
      </div>
    </div>

    <div class="register">
        <h1>Registration</h1>
      <form id="registerForm" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="input-box">
          <div class="input-field">
            <input
              type="text"
              id="fullname"
              name="fullname"
              placeholder="Full Name"
              required
            />
            <i class="bx bxs-user"></i>
          </div>
          <div class="input-field">
            <input
              type="text"
              id="username"
              name="username"
              placeholder="Username"
              required
            />
            <i class="bx bxs-heart"></i>
          </div>
        </div>

        <div class="input-box">
          <div class="input-field">
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Email"
              required
            />
            <i class="bx bxs-envelope"></i>
          </div>
        </div>

        <div class="input-box">
          <div class="input-field">
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Password"
              required
            />
            <i class="bx bxs-lock"></i>
          </div>
          <div class="input-field">
            <input
              type="password"
              id="password_confirmation"
              name="password_confirmation"
              placeholder="Confirm Password"
              required
            />
            <i class="bx bxs-lock"></i>
          </div>
        </div>

        <div class="logo"></div>

        <button type="submit" class="btn" >
          Daftar
        </button>
      </form>
    </div>
    <script src="register.js"></script>
  </body>
</html>
