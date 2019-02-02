<?php


?>


<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <!-- Custom Stylesheet -->
  <link href="assets/css/login.css" rel="stylesheet">
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>

  <!-- Bootstrap 4 dependencies -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg transparent navbar-dark fixed-top">
          <a class="navbar-brand" href="index.php"><img src="assets/icons/logo.png" alt="travelBuddy"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="register.php">SIGN UP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">ABOUT<span class="sr-only">(current)</span></a>
              </li>

            </ul>
          </div>
        </nav>


  <!-- Banner -->
  <div id="mainbanner" class="view">
        <div class="full-bg-img">
          <div class="banner">



            <h1 class="login-disp">Login.</h1>



            <div class="form">
              <form method="POST" action="includes/handlers/login-handler.php" class="login-form">
                <input class="username form-text-box" type="email" name="loginEmail" label="E-mail" placeholder="E-Mail" >
                <input class="pass" type="password" label="Password" name="loginPassword" placeholder="Password">
                <button name="login">Login</button>
                <ul class="options">
                  <li><a href="register.php">Don't have an account?</a></li>
                  <li><a href="">Forgot Password?</a>
                </ul>
              </form>
            </div>
          </div>
        </div>
    </div>

</body>
</html>
