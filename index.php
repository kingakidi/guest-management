<?php
    include "./control/conn.php";
    if (isset($_SESSION['userid'])) {
      header("Location: ./dashboard.php");
    }

?>

<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Alheri Guest Management</title>
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="./css/login.css">
  </head>
  <body>
    <nav class="bg-primary text-center text-white p-3">
      <h4>ALHERI BANK LIMITED</h3>
    </nav>

    <div class="container login-main">
      <div class="login-container p-3 m-3">
        <form action="" class="form-login" id="login-form">
          <div class="form-group">
            <label for="username">Enter Email Address</label>
            <input
              type="text"
              class="form-control"
              id="username"
              placeholder="Enter Email Address"
            />
          </div>
          <div class="form-group">
            <label for="password">Enter Password</label>
            <input
              type="password"
              class="form-control"
              placeholder="Enter Password" id="password"
            />
          </div>
          <div class="show-status text-center" id="show-status"></div>
          <div>
            <a href="./activate.php">Activate Account</a>
          </div>
          <div class="form-group text-right">
            <button class="btn btn-primary" id="btn-login">Login</button>
          </div>
        </form>
      </div>
    </div>

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="./js/functions.js"></script>
    <script src="./js/login.js"></script>
  </body>
</html>
