<script src="js/jquery-3.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/lga.js"></script>
<script src="./js/functions.js"></script>

    <?php
        // MANAGE ROUTES 
        if (isset($_GET['p'])) {
            $p = $_GET['p'];
            
            echo "<script src='./js/$p.js'></script>";
        }
    ?>
</body>
</html>