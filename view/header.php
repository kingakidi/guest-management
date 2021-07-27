<?php 
  include "./control/conn.php";
  function error($data)
  {
      return "<span class='text-danger'>$data</span>";
  }
  function success($data)
  {
      return "<span class='text-success'>$data</span>";
  }
  if (!isset($_SESSION['userid'])) {
    header("Location: ./index.php");
  }
?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Alheri Guest Management</title>
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="./css/bootstrap.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="./css/morris.css"
    />
   

    <!-- <link
      rel="stylesheet"
      href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"
    /> -->
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="./css/bootstrap-material-design.min.css" /> -->
    <!-- <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    /> -->

  
  </head>