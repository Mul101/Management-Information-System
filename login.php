<?php
session_start();
require 'functions.php';

if( isset($_SESSION["login"])){
  header("Location: home.php");
  exit;
}

if(isset($_POST["login"])){
    $username = $_POST["name"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT*FROM users WHERE name = '$username'");

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])){
          // set session
          $_SESSION["login"] = true;

          header("Location: home.php");
          exit;
        }
    }

    $error = true;
}
?>

<!--https://mdbootstrap.com/docs/standard/extended/login/#!-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/login.css" rel="stylesheet">
  <script type="text/javascript" src="chartjs/Chart.js"></script>
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
  <section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-4 ms-xl-5">
          <!--<i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>-->
          <!--<span class="h1 fw-bold mb-0"> </span>-->
          <img src="img/CafeLogo.png ">
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
        
            <form action=""  style="width: 23rem;" method="post">
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; font-weight: bold;">Log in</h3>
                <div class="form-input">
                    <input type="username" id="name" name="name" placeholder="Username" />
                    <!--<label class="form-label" for="form2Example17">Username</label>-->
                </div>

                <div class="form-input">
                    <input type="password" id="password" name="password" placeholder="Password"/> <!-- class="form-control form-control-lg"-->
                </div>
                <?php if(isset($error)) : ?>
                    <p style = "color: red; font-style: italic">Username atau Password salah!</p>
                <?php endif; ?>
                <div class="pt-1 mb-4 form-box">
                    <button class="btn btn-block text-uppercase" type="submit" name="login">Login</button>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
            </form>
        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="img/bg_coffe.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
</body