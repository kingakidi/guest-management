<?php
    include "./control/conn.php";
    $_SESSION['userid'] = NULL;
    session_unset();
    header("Location: ./index.php");