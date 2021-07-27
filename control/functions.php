<?php
        include "./conn.php";
        function clean($data)
        {
            global $conn;
           return trim(mysqli_real_escape_string($conn, $data));
        }
    
        function error($data)
        {
            return "<span class='text-danger'>$data</span>";
        }
        function success($data)
        {
            return "<span class='text-success'>$data</span>";
        }